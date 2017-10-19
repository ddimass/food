<?php

class OrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('setcourier', 'setstate','courier','admin','plus','minus','delete1','index','view','ajax','addclient','clientview','updateclient','addtolist','create','update','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Order;
		
		$session = Yii::app()->session;
		$session['clid'] = -1;
		$session['coid'] = -1;
//		$session['post'] = 2;
		if (!isset($_POST['Order'])) {
//		$session['cli'] = $session['cli']+1;
		OrderTemp::model()->deleteallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		}
		$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
		$orderlist->unsetattributes();
		$phlists = Phones::model()->findall();
		$cats = ProductCat::model()->findallbyattributes(array('tbl_cat_id'=>'21'));
		$i=0;
		foreach ($cats as $cat) {
		$prodcats[$i] = Product::model()->findbypk($cat->tbl_product_id);
		$i=$i+1;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
		$order = new Order;
		$order->date_time = new CDbExpression('NOW()');
		$order->tbl_user_id = Yii::app()->user->id;
		$order->tbl_client_id = $_POST['Order']['tbl_client_id'];
		if (trim($_POST['Order']['description'])!='')$order->description = $_POST['Order']['description'];
		if (trim($_POST['Order']['tbl_courier_id'])!='') {$order->tbl_courier_id = $_POST['Order']['tbl_courier_id'];}
		$order->tbl_state_id = $_POST['Order']['tbl_state_id'];
		$order->cash = $_POST['Order']['cash'];
		$ordertems = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		$order->cost = 0;
		$session = Yii::app()->session;
		$session['clid'] = Clients::model()->findbypk($order->tbl_client_id)->tbl_discount_type_id;
		$order->tbl_discount_type_id = Order::sales();
		$session['coid'] = $order->tbl_courier_id;
		$order->cost = Order::calc();
//		$session['post']= $order['cost'];
		$order->save();
//		$session['post'] = $ordertems;
		foreach ($ordertems as $ordertem) {
		$orderl = new OrderList;
		$orderl->count = $ordertem->count;
		$orderl->tbl_product_id=$ordertem->tbl_product_id;
		$orderl->tbl_order_id = $order->id;
		$orderl->cost = $ordertem->cost;
		$orderl->date = new CDbExpression('NOW()');
//		$orderl->cost_disc = 
		$order->cost = $order->cost + $ordertem->cost;
		
		$orderl->save(false);
		$ingredsts = Product::ingcalc($ordertem->tbl_product_id);
		foreach ($ingredsts as $ingred) {
			foreach($ingred['ings'] as $ing) {
			$ording = new OrderIngred;
			$ording->tbl_order_id = $order->id;
			$ording->tbl_product_id = $ordertem->tbl_product_id;
			$ording->tbl_ingred_id = $ing['iid'];
			$ording->count = $ing['count'];
			$ording->dt = new CDbExpression('NOW()');
			$ording->held = 0;
			$ording->save(false);			
			}
		}
		}
		
		$client = Clients::model()->findbypk($order->tbl_client_id);
		$client->ord_count = Clients::ordp($order->tbl_client_id);
//		if ($client->tbl_discount_type_id<6) {
//		if ($client->ord_count > 1){$client->tbl_discount_type_id = 2;}
//		if ($client->ord_count > 3){$client->tbl_discount_type_id = 3;}
//		if ($client->ord_count > 8){$client->tbl_discount_type_id = 4;}
//		if (($client->ord_count)%20==0){$client->tbl_discount_type_id = 5;}
//		}
		$client->save(false);
		$session = Yii::app()->session;
		$session['clid'] = '-1';
		$session['coid'] = '-1';
		OrderTemp::model()->deleteallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));

			// if($model->save())
		$this->redirect(array('admin'));
		}
		
		$this->render('create',array(
			'model'=>$model,
			'prodcats'=>$prodcats,
			'phlists'=>$phlists,
			'orderlist'=>$orderlist,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$orderl=$this->loadModel($id);
		// Set OrderTemp
		$session = Yii::app()->session;
		$session['clid'] = $orderl->tbl_discount_type_id;
		$session['coid'] = $orderl->tbl_courier_id;
		$clmodel=Clients::model()->findbypk($orderl->tbl_client_id);
		$admodel=Address::model()->findbyattributes(array('tbl_clients_id'=>$orderl->tbl_client_id));
		$phmodel=Phones::model()->findbyattributes(array('tbl_clients_id'=>$orderl->tbl_client_id));

//		$session['post']
		if (!isset($_POST['Order'])) {
//		$session['cli'] = $session['cli']+1;
		OrderTemp::model()->deleteallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		}

		if(isset($_POST['Order']))
		{
		// $order = new Order;
		// $order->date_time = new CDbExpression('NOW()');
		// $order->tbl_user_id = Yii::app()->user->id;
		$orderl->tbl_client_id = $_POST['Order']['tbl_client_id'];
		if (trim($_POST['Order']['description'])!='')$orderl->description = $_POST['Order']['description'];
		if (trim($_POST['Order']['tbl_courier_id'])!='') {$orderl->tbl_courier_id = $_POST['Order']['tbl_courier_id'];}
		if (trim($_POST['Order']['cash'])!='') {$orderl->cash = $_POST['Order']['cash'];}
		$orderl->tbl_state_id = $_POST['Order']['tbl_state_id'];
		OrderState::add($orderl->id,$orderl->tbl_state_id);
		$ordertems = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		$orderl->cost = 0;
		// foreach ($ordertems as $ordertem) {
		$session['clid'] = Clients::model()->findbypk($orderl->tbl_client_id)->tbl_discount_type_id;
		//$session['clid'] = $order->tbl_client_id;
		$session['coid'] = $orderl->tbl_courier_id;
//		$orderl->tbl_discount_type_id = Clients::model()->findbypk($orderl->tbl_client_id)->tbl_discount_type_id;
		$orderl->cost = Order::calc();
		// $session['post']= $orderl;
		// }
		
		OrderIngred::model()->deleteallbyattributes(array('tbl_order_id'=>$orderl->id));
		OrderList::model()->deleteallbyattributes(array('tbl_order_id'=>$orderl->id));

		foreach ($ordertems as $ordertem) {
		$orderli = new OrderList;
		$orderli->count = $ordertem->count;
		$orderli->tbl_product_id=$ordertem->tbl_product_id;
		$orderli->tbl_order_id = $orderl->id;
		$orderli->cost=$ordertem->cost;
		// orderl->cost = $orderl->cost + $ordertem->cost;
		$orderli->save(false);
		if ($orderl->tbl_state_id != 6) {
		$ingredsts = Product::ingcal($ordertem->tbl_product_id,$ordertem->count);
		OrderIngred::sav($ingredsts,$orderl->id,$ordertem->tbl_product_id);
		}
		} 

			// if($model->save())
		OrderTemp::model()->deleteallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		if ($orderl->tbl_state_id==6) {
		$clin = Clients::ordm($orderl->tbl_client_id);
//		$client = Clients::model()->findbypk($orderl->tbl_client_id);
//		if ($client->tbl_discount_type_id<6) {
//		if ($clin > 1){$client->tbl_discount_type_id = 2;}
//		if ($clin > 3){$client->tbl_discount_type_id = 3;}
//		if ($clin > 8){$client->tbl_discount_type_id = 4;}
//		if ($clin !=0){
//		if (($clin%20)==0){$client->tbl_discount_type_id = 5;}}}
//		$client->save(false);
		}
		// $session['post'] = $orderl;
		$orderl->save(false);
		
		$this->redirect(array('admin'));
		}
		$ordliss = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$orderl->id));
		foreach ($ordliss as $ordlis) {
		$ordtem = new OrderTemp;
		$ordtem->tbl_product_id = $ordlis->tbl_product_id;
		$ordtem->count = $ordlis->count;
		$ordtem->tbl_order_id = $ordlis->tbl_order_id;
		$ordtem->price = Product::model()->findbypk($ordlis->tbl_product_id)->price;
		$ordtem->cost = $ordlis->cost;
		$ordtem->tbl_user_id = Yii::app()->user->id;
		$ordtem->save(false);
		}
		//
		$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
		$orderlist->unsetattributes();
		$phlists = Phones::model()->findall();
		$cats = ProductCat::model()->findallbyattributes(array('tbl_cat_id'=>'21'));
		$i=0;
		foreach ($cats as $cat) {
		$prodcats[$i] = Product::model()->findbypk($cat->tbl_product_id);
		$i=$i+1;
		}
		// $prodcats = Prodact::model()->findallbyattributes(array(''=>''));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		$this->render('update',array(
			'model'=>$orderl,
			'prodcats'=>$prodcats,
			'phlists'=>$phlists,
			'orderlist'=>$orderlist,
			'phmodel'=>$phmodel,
			'admodel'=>$admodel,
			'clmodel'=>$clmodel,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionSetState() 
	{
	$oid = $_POST['oid'];
	$sid = $_POST['sid'];
	$session = Yii::app()->session;
	$session['soid'] = array('oid'=>$oid,'sid'=>$sid);

	$order = Order::model()->findbypk($oid);
	$session = Yii::app()->session;
	$session['soid'] = array('oid'=>$oid,'sid'=>$sid);
	if ($order->tbl_state_id < $sid) {
	$order->tbl_state_id = $sid;
	$order->save(false);
	OrderState::add($oid,$sid);
//	OrderState::add($orderl->id,$orderl->tbl_state_id);
	}
	}
	public function actionSetCourier() 
	{
	$oid = $_POST['oid'];
	$cid = $_POST['cid'];
	$order = Order::model()->findbypk($oid);
	$order->tbl_courier_id = $cid;
	$order->save(false);
	}
	

	
	public function actionCourier() 
	{
	$session = Yii::app()->session;
	$session['coid'] = $_POST['coid'];
	//$orderlist = new OrderList;
	}
	public function actionAddClient() 
	{
	$model = new Order;
	if (trim($_POST['Clients']['id'])!='') {
//	$session = Yii::app()->session;
//	$session['post'] = $_POST;
	$clmodel = Clients::model()->findbypk($_POST['Clients']['id']);
	$session = Yii::app()->session;
	$session['clid']=$clmodel->tbl_discount_type_id;
	$admodel = Address::model()->findbyattributes(array('tbl_clients_id'=>$clmodel->id));
	$phmodel = Phones::model()->findbyattributes(array('tbl_clients_id'=>$clmodel->id));
	$clmodel->name = $_POST['Clients']['name'];
	if (trim($_POST['Clients']['tbl_discount_type_id'])!=$clmodel->tbl_discount_type_id){$clmodel->tbl_discount_type_id = $_POST['Clients']['tbl_discount_type_id'];}
	// if (trim($_POST['Clients']['blocked']) != $clmodel->blocked){$clmodel->blocked = $_POST['Clients']['blocked'];}
	$clmodel->save(false);
	if (trim($_POST['Address']['address'])!=$admodel->address){$admodel->address = $_POST['Address']['address'];
	$admodel->save(false);
	}
	if (trim($_POST['Phones']['phone'])!=$phmodel->phone){$phmodel->phone = $_POST['Phones']['phone'];
	$phmodel->save(false);
	}
	$model->tbl_client_id = $clmodel->id;
	}
	else {
	$clmodel = new Clients; 
	$admodel = new Address;
	$phmodel = new Phones; 
	$clmodel->attributes = $_POST['Clients'];
	$admodel->attributes = $_POST['Address'];
	$phmodel->attributes = $_POST['Phones'];
	$clmodel->save(false);
	$admodel->tbl_clients_id = $clmodel->id;
	$phmodel->tbl_clients_id = $clmodel->id;
	$model->tbl_client_id = $clmodel->id;
	$admodel->save(false);
	$phmodel->save(false);
	}
	$phlists = Phones::model()->findall();
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	$json = $this->renderpartial('_client',array('model'=>$model,'phlists'=>$phlists), true, true);
	echo CJSON::encode($json);
	}
	
	
        
	public function actionClientview()
	{
//	$session = Yii::app()->session;
//	$session['clid'] = 2;
	if ($_POST['clientid']!=-1) {
	$clientid = $_POST['clientid'];	
	$session['clid']=Clients::model()->findbypk($clientid)->tbl_discount_type_id;
	$clmodel = Clients::model()->findbypk($clientid);
	$phmodel = Phones::model()->findbyattributes(array('tbl_clients_id'=>$clientid));
	$admodel = Address::model()->findbyattributes(array('tbl_clients_id'=>$clientid));
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	$session = Yii::app()->session;
	$session['clid']=Clients::model()->findbypk($clientid)->tbl_discount_type_id;
	$json = $this->renderpartial('_clientf',array('model'=>$clmodel,'phmodel'=>$phmodel,'admodel'=>$admodel), true);
	echo CJSON::encode($json);
	}
	else {
	$clmodel = new Clients;
	$admodel = new Address;
	$phmodel = new Phones;
	$session = Yii::app()->session;
	$session['clid']='-1';
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	$json = $this->renderpartial('_clientf',array('model'=>$clmodel,'phmodel'=>$phmodel,'admodel'=>$admodel), true);
	echo CJSON::encode($json);
	}
	}
	
	public function actionDelete1($id)
	{
	$ot = OrderTemp::model()->findbypk($id);
	$ordlist = OrderList::model()->findbyattributes(array('tbl_order_id'=>$ot->tbl_order_id,'tbl_product_id'=>$ot->tbl_product_id));
	if (!isset($ordlist) or (Yii::app()->user->role==1)) {
	OrderTemp::model()->deletebypk($id);}
	$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
	$orderlist->unsetattributes();
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	echo $this->renderpartial('_orderlist',array('orderlist'=>$orderlist), true);
	}
	
	
	public function actionMinus($id)
	{
	$ot = OrderTemp::model()->findbypk($id);
	$ordlist = OrderList::model()->findbyattributes(array('tbl_order_id'=>$ot->tbl_order_id,'tbl_product_id'=>$ot->tbl_product_id));
	if (Yii::app()->user->role == 2) {
	if ($ot->count > $ordlist->count) {
	$ot->count = $ot->count - 1;
	if ($ot->count == 0) {$ot->delete();}
	else {
	$ot->cost = $ot->count * $ot->price;
	$ot->save(false);
	}}}
	if (Yii::app()->user->role == 1) {
	$ot->count = $ot->count - 1;
	if ($ot->count == 0) {$ot->delete();}
	else {
	$ot->cost = $ot->count * $ot->price;
	$ot->save(false);
	}}
	
	$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
	$orderlist->unsetattributes();
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	echo $this->renderpartial('_orderlist',array('orderlist'=>$orderlist));
	}
	
	public function actionPlus($id)
	{
	$ot = OrderTemp::model()->findbypk($id);
	$ot->count = $ot->count + 1;
	$ot->cost =$ot->count * $ot->price;
	$ot->save(false);
	$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
	$orderlist->unsetattributes();
	Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	$this->renderpartial('_orderlist',array('orderlist'=>$orderlist));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$order=new Order;
		$this->render('index',array(
			'order'=>$order,
			'catid'=>$catid,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionAddtolist()
	{
	$pa = $_POST['prodadd'];
	$isold = 0;
	$ordliss = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
	$session = Yii::app()->session;
	if (isset($ordliss['0'])) {
	$sex=20;}
	else {$sex=10;}
	foreach ($ordliss as $ordlis) {
	if ($ordlis->tbl_product_id==$pa) {
	$ordlis->count = $ordlis->count + 1;
	$isold = 1;
	$ordlis->cost = $ordlis->price * $ordlis->count;
	$ordlis->save(false);
	}
	}
	if ($isold==0) {
	$tempord = new OrderTemp;
	$tempord->tbl_user_id = Yii::app()->user->id;
	$tempord->tbl_product_id = $pa;
	$tempord->count = 1;
	$tempord->price = Product::model()->findbypk($pa)->price;
	$tempord->cost = $tempord->price * $tempord->count;
	$tempord->save(false);
	}
	$orderlist = new OrderTemp('search'); // byattributes(array('random'=>$session['random']));
	$orderlist->unsetattributes();
	$ordt = OrderTemp::model()->findbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
	if ($sex == 10) {
	$this->renderpartial('_orderlist',array('orderlist'=>$orderlist),false,true); 
	} else {$this->renderpartial('_orderlist',array('orderlist'=>$orderlist)); }
	}
	
	public function actionAjax() {
	$catid = $_GET['catid'];
//	$catid = -1;
	$prodcats = array();
	if (isset($catid)) {
		if ($catid<0) {
			$prodcats = Product::model()->findall();
		} else {
			$pcats = ProductCat::model()->findallbyattributes(array('tbl_cat_id'=>$catid));
			$i = 0;
			foreach ($pcats as $pcat) {
				$prodcats["$i"] = Product::model()->findbypk($pcat->tbl_product_id);
				$i=$i+1;
			}
		}
	}
//		$model = new Order;
		$ordt = OrderTemp::model()->findallbyattributes(array('tbl_user_id'=>Yii::app()->user->id));
		$session = Yii::app()->session;
		//$session['post'] = $ordt;
		// if (isset($ordt['cost'])){
		 Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		 //$session['post'] = 25;
		 // }
		echo $this->renderPartial('_prods', array('prodcats'=>$prodcats), false, true);
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
