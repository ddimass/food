<?php

class MarginController extends Controller
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
				'actions'=>array('index','view'),
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
		$model=new Margin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Margin']))
		{
			$model->attributes=$_POST['Margin'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Margin']))
		{
			$model->attributes=$_POST['Margin'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Margin');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
        public function actionAdmin()
        {
        setlocale(LC_ALL, 'ru_RU.utf8');
        if (isset($_POST['day'])) {
        Margin::model()->deleteall();
        $date = $_POST['day'] . " 05:00:00";
        $dayn = $_POST['dayn'] . " 05:00:00";
        $datee = $date;
        $crit = new CDbCriteria;
        $daynn = date("Y-m-d H:i:s", strtotime("$dayn"));
        $crit->addBetweencondition('date_time',$datee,$daynn, 'AND');
        $crit->compare('tbl_state_id', 4);
        $orders = Order::model()->findall($crit);
        $products = Product::model()->findall();
        foreach ($products as $product) {
        $model = new Margin;
        $count = 0;
        $sum = 0;
        foreach ($orders as $order) {
//        $val = $disc->value;
	unset($ordlists);
	$ordlists = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id)); 
	$sumo = 0;
	$di = 0;
	foreach ($ordlists as $ordlist) {
	$sumo = $sumo + $ordlist->cost;
	}
	
	if (round($sumo) != round($order->cost)) {$di = 1;}
        $order_lists = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id,'tbl_product_id'=>$product->id));
       foreach ($order_lists as $order_list) {
        unset($disc);
        $count = $count + $order_list->count;
        $disc = DiscountType::model()->findbypk($order->tbl_discount_type_id);
//        $sum = $sum + $order_list->cost;
        if ((Product::sale($product->id)==1) and ($di==1)) {
        $sum = $sum  + ($order_list->cost - $order_list->cost * $disc->value / 100);
        } else {$sum = $sum + $order_list->cost;} 
        }
        }
	$model->name = $product->name;
	$model->count = $count;
	$model->cost_count = $sum;
	if ($count != 0 ) {
	$model->cost = $sum /$count;} else {$model->cost = 0;}
	$model->own_cost = $product->own_price;
	$model->own_cost_count = $product->own_price * $count;
	if ($product->own_price != 0) {
	$model->margin = ($product->price - $product->own_price) / $product->own_price * 100;} else {
	$model->margin = 0;
	}
	if ($product->price != 0) {
	$model->own_margin = $product->own_price / $product->price * 100;} else {
	$model->own_margin = 0;
	}
	$model->margin_cost = $model->cost_count - $model->own_cost_count;
	$model->cat = Cat::model()->findbypk(ProductCat::model()->findbyattributes(array('tbl_product_id'=>$product->id))->tbl_cat_id)->name;
	$model->kitchen = Kitchen::model()->findbypk($product->tbl_kitchen_id)->name;
	if ($count != 0) {
	$model->save(false); }
        }
        Yii::import('ext.csvexport.ECSVExport');
        $csvmods = Margin::model()->findall();
        $my = array();
        foreach ($csvmods as $csvmod) {
        $csvex = array (
    			'Продукт'=>$csvmod->name,
    			'Количество'=>$csvmod->count,
    			'Отпускная цена'=>$csvmod->cost,
    			'Сумма'=> $csvmod->cost_count,
    			'Себестоимость'=> $csvmod->own_cost,
    			'Сумма собс.'=> $csvmod->own_cost_count,
    			'Доход руб.'=> $csvmod->margin_cost,
    			'Наценка %' => $csvmod->margin,
    			'Себ-ть %' => $csvmod->own_margin,
    			'Категория' => $csvmod->cat,
    			'Кухня' => $csvmod->kitchen,
    			);
    	$my[] = $csvex;
        }
        $csv = new ECSVExport($my);
        $csv->toCSV('margin.csv', $delimiter=';');
	$model->unsetAttributes();  // clear any default values
	$this->render('admin',array(
			'model'=>$model,
		)); 
	} else {



		$model=new Margin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Margin']))
			$model->attributes=$_GET['Margin'];

		$this->render('admin',array(
			'model'=>$model,
		)); }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Margin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Margin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Margin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='margin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
