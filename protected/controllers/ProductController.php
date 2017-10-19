<?php

class ProductController extends Controller
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
		$model=new Product;
		$pcmodel = new ProductCat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$model->enabled=$_POST['Product']['enabled'];
			$model->image=CUploadedFile::getInstance($model,'image');
			if (trim($model->image)==''){unset($model->image);}
			if($model->save()) {
				if (isset($model->image)){
				$model->image->saveAs('images/product/' . $model->image);
				$img = new EasyImage('images/product/' . $model->image);
				$img->resize(100);
				$img->save('/var/www/Sofit_Food/expr/tmb_images/product/' . $model->image);
				}
				if(!isset($_POST['ProductCat'])) {
//				$session = Yii::app()->session;
//				$session['catid'] = $_POST['ProductCat'];
				$this->redirect(array('index'));
				}
				else {
				
				foreach ($_POST['ProductCat']['tbl_cat_id'] as $catid) {
				$prcat = new ProductCat;
				$prcat->tbl_product_id=$model->id;
				$prcat->tbl_cat_id=$catid;
				$prcat->save();
				}
				$this->redirect(array('index'));
				}
			}
		}
		

		$this->render('create',array(
			'model'=>$model,
			'pcmodel'=>$pcmodel,
		));
	}

	/*
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Product::calc($id);
		$model=$this->loadModel($id);
		$pcmodels=ProductCat::model()->findallbyattributes(array('tbl_product_id'=>$id));
//		$pcm = new ProductCat;
		$pcm=ProductCat::model()->findbyattributes(array('tbl_product_id'=>$id));
		if (!isset($pcm['id'])) {$pcm = new ProductCat;}
		$tbl_cat_ids = array('tbl_cat_id'=>'');
		//foreach ($pcmodels as $pcmodel) {
		//$pcm['tbl_cat_id'] = $tbl_cat_ids['tbl_cat_id'] . $pcmodel->tbl_cat_id . ',';
		//}
//		$session = Yii::app()->session;
//		$session['post'] = $pcmodel;
//		$this->redirect(array('test/index'));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Product']))
		{
			if (!trim($_POST['Product']['name'])=='') {$model->name=$_POST['Product']['name']; }
			if (!trim($_POST['Product']['description'])=='') {$model->description=$_POST['Product']['description']; }
			if (!trim($_POST['Product']['tbl_kitchen_id'])=='') {$model->tbl_kitchen_id=$_POST['Product']['tbl_kitchen_id']; }
			if (!trim($_POST['Product']['price'])=='') {$model->price=$_POST['Product']['price']; }
			$model->image=CUploadedFile::getInstance($model,'image');
			if (trim($model->image)=='') {unset($model->image);}
			$model->enabled=$_POST['Product']['enabled'];
//			$session = Yii::app()->session;
//			$session['post'] = $model->image;
//			$this->redirect(array('test/index'));
			if (isset($_POST['Product']['sort'])) {$model->sort=$_POST['Product']['sort']; }
			if($model->save()) {
//			$session = Yii::app()->session;
//			$session['post'] = $model->image;
//			$this->redirect(array('test/index'));
				if (isset($model->image)) {$model->image->saveAs('images/product/' . $model->image);
				$img = new EasyImage('images/product/' . $model->image);
				$img->resize(100);
				$img->save('/var/www/Sofit_Food/expr/tmb_images/product/' . $model->image);
				}
				if (!isset($_POST['ProductCat'])){
				$this->redirect(array('index','id'=>$model->id));
				} else {
				
				ProductCat::model()->deleteallbyattributes(array('tbl_product_id'=>$model->id));
				foreach ($_POST['ProductCat']['tbl_cat_id'] as $catid) {
				$prcat = new ProductCat;
				$prcat->tbl_product_id=$model->id;
				$prcat->tbl_cat_id=$catid;
				$prcat->save();
				}
				$this->redirect(array('Product/index'));
				}
				} }
				$this->render('update',array('model'=>$model,'pcmodel'=>$pcm));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		ProductCat::model()->deleteAllByAttributes(array(
		'tbl_product_id'=>$id,
		));
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
//	$price = Ingred::calc(6,5);
//	$session = Yii::app()->session;
//	$session['post'] = $price;
//	$this->redirect(array('test/index'));
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
