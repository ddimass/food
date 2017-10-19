<?php

class CashController extends Controller
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
		$model=new Cash;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cash']))
		{
			$model->attributes=$_POST['Cash'];
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

		if(isset($_POST['Cash']))
		{
			$model->attributes=$_POST['Cash'];
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
		$dataProvider=new CActiveDataProvider('Cash');
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
	Cash::model()->deleteall();
	$date = $_POST['day'] . " 05:00:00";
	$dayn = $_POST['dayn'] . " 05:00:00";
	$datee = $date;
	while ($datee != $dayn) { 
	$crit = new CDbCriteria;
	$daynn = date("Y-m-d H:i:s", strtotime("$datee +1 days"));
	$crit-> addBetweencondition('date_time',$datee,$daynn, 'AND');
	$orders = Order::model()->findall($crit);
	
	$day_cost = 0;
	$day_count = 0;
	$day_p_count = 0;
	$day_apr_check = 0;

	$hall_cost = 0;
	$hall_count = 0;
	$hall_p_count = 0;
	$hall_apr_check = 0;
	$hall_man = '';

	$deli_cost = 0;
	$deli_count = 0;
	$deli_p_count = 0;
	$deli_apr_check = 0;
	$deli_man = '';

	$hall_man_cost = 0;
	$deli_man_cost = 0;
	$model = new Cash;
	$model->dt = $datee;
	$model->day = strftime("%A", strtotime($datee));
	foreach ($orders as $order) {
	if ($order->tbl_state_id==4) {
	$day_count = $day_count +1;
	$day_cost = $day_cost + $order->cost;
	if ($order->tbl_courier_id==1) {
	$hall_count = $hall_count +1;
	$hall_cost = $hall_cost + $order->cost;
	$hall_man = User::model()->findbypk($order->tbl_user_id)->name;
	} else {
	$deli_count = $deli_count +1;
	$deli_cost = $deli_cost + $order->cost;
	$deli_man = User::model()->findbypk($order->tbl_user_id)->name;	
	}
	}
	}
	if ($day_count != 0) {
	$day_apr_check = $day_cost / $day_count;}
	if ($hall_count != 0) {
	$hall_apr_check = $hall_cost / $hall_count;}
	if ($deli_count != 0) {
	$deli_apr_check = $deli_cost / $deli_count;}
	$model->hall_cost = $hall_cost;
	$model->hall_count = $hall_count;
	$model->hall_apr_check = $hall_apr_check;

	$model->deli_cost = $deli_cost;
	$model->deli_count = $deli_count;
	$model->deli_apr_check = $deli_apr_check;

	$model->day_cost = $day_cost;
	$model->day_count = $day_count;
	$model->day_apr_check = $day_apr_check;

	$model->hall_man = $hall_man;
	$model->deli_man = $deli_man;
	
	$model->hall_man_cost = $hall_cost * 0.05;
	$model->deli_man_cost = $deli_cost * 0.02;
	
	$model->save(false);
	$datee = date("Y-m-d H:i:s", strtotime("$datee +1 days"));
	}
	$model->unsetAttributes();  // clear any default values

	$this->render('admin',array(
	'model'=>$model,
	));
	} 
	else {
		$model=new Cash('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cash']))
			$model->attributes=$_GET['Cash'];

		$this->render('admin',array(
			'model'=>$model,
		));
	} }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cash the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cash::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cash $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cash-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
