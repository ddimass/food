<?php

class UsersReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','csv'),
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
		$model=new UsersReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UsersReport']))
		{
			$model->attributes=$_POST['UsersReport'];
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

		if(isset($_POST['UsersReport']))
		{
			$model->attributes=$_POST['UsersReport'];
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
		$dataProvider=new CActiveDataProvider('UsersReport');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */

	public function actionCsv()
	{
	$model = new UsersReport;
	Yii::import('ext.csvexport.ECSVExport');
	$phones = Phones::model()->findall();
	$my = array();
	$i=0;
	foreach($phones as $phone) {
	$name = Clients::model()->findbypk($phone->tbl_clients_id);
	$address = Address::model()->findbyattributes(array('tbl_clients_id'=>$phone->tbl_clients_id));
	$us = array(
			'Телефон'=>$phone->phone,
			'Имя'=>$name->name,
			'Адрес'=>$address->address,
			'Количество заказов'=>$name->ord_count,
			);
	if (trim($name->name) <> '') {
	$my[] = $us;
	}
	}
//	print_r($my);
	$csv = new ECSVExport($my);
	$csv->toCSV('users.csv',$delimiter=';');
	$this->render('index',array(
			'model'=>$model,
		));

	}
	
	public function actionAdmin()
	{
		$model=new UsersReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsersReport'])) {
			$model->attributes=$_GET['UsersReport']; }
		 else {
		UsersReport::model()->deleteall();
		$users = Clients::model()->findall();
		foreach ($users as $user) {
		$ur = new UsersReport;
		$ur->name = $user->name;
		$ur->order_count = $user->ord_count;
//		$ur->phone = Phones::model()->findbyattributes(array('tbl_clients_id'=>$user->id))->phone;
		$ur->Address = Address::model()->findbyattributes(array('tbl_clients_id'=>$user->id))->address;
		if ($ur->phone != ''){$ur->save(false);}
		}
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsersReport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsersReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsersReport $model the model to be validated
**/
}
