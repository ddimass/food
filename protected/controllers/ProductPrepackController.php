<?php

class ProductPrepackController extends Controller
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
//	public function ingredcalc($id,$count)
//	{
//	$model = Ingred::model()->findbypk($id);
//	return $count * $model->cost;
//	}
//	public function prepackcalc($id,$count)
//	{
//	$price = 0;

//	$ingreds = PrepackIngred::model()->findallbyattributes(array('tbl_prepack_id'=>$id));
//	$countout = $count / Prepack::model()->findbypk($id)->out;
//	foreach ($ingreds as $ingred) {
//	$ingcount = $countout * $ingred->count;
//	$price = $price + $this->ingredcalc($ingred->tbl_ingred_id,$ingcount);
//	
//	}
	
//	$prepacks = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$id));
//	foreach ($prepacks as $prepack) {
//	$precount = $countout * $prepack->count;
//	$price = $price + $this->prepackcalc($prepack->prepack_id,$precount);
//	}
//	return $price;
//	}
	public function actionCreate($id)
	{
		$prepacks = ProductPrepack::model()->findallbyattributes(array('tbl_product_id'=>$id));
		$sale = 0;
//		$session = Yii::app()->session;
//		$session['post'] = $prepacks;
//		$this->redirect(array('test/index'));
//		foreach ($prepacks as $prepack) {
		
//		$sale = $sale + $this->prepackcalc($prepack->tbl_prepack_id,$prepack->count);
//		}
//		$prodmod = Product::model()->updatebypk($id,array('own_price'=>$sale));
		$models=ProductPrepack::model()->findallbyattributes(array('tbl_product_id'=>$id));
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductPrepack']))
		{
		//	$model->attributes=$_POST['ProductPrepack'];
		ProductPrepack::model()->deleteallbyattributes(array('tbl_product_id'=>$_POST['ProductPrepack']['tbl_product_id']));
		$sale = 0;
		foreach ($_POST['ProductPrepack'] as $pi) {
		$model = new ProductPrepack;
		$model->tbl_product_id = $_POST['ProductPrepack']['tbl_product_id'];
		if (is_array($pi)) {
			if ($pi['count'] > 0) {
			$model->tbl_prepack_id = $pi['tbl_prepack_id'];
			$model->count = $pi['count'];
//			$prepacks = Pre::model()->findallbyattributes(array('tbl_prepack_id'=>$model->tbl_prepack_id));
//			foreach ($ingreds as $ingred) {
//			$cost = Ingred::model()->findbypk($ingred['tbl_ingred_id'])->cost;
//			$sale = $sale + ($cost * $ingred['out'] * $pi['count']);
			
//			}
			$model->save();
			}
		}
		}
		Product::calc($id);
		$this->redirect(array('Product/admin'));
		}
	//	if($model->save())
	//			$this->redirect(array('view','id'=>$model->id));
	//	}

		$this->render('create',array(
			'models'=>$models,
			'pid'=>$id,
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

		if(isset($_POST['ProductPrepack']))
		{
			$model->attributes=$_POST['ProductPrepack'];
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
	// $price = Prepack::ingredcalc(6,5);
	// $session = Yii::app()->session;
	// $session['post'] = $price;
	// $this->redirect(array('test/index'));

		$dataProvider=new CActiveDataProvider('ProductPrepack');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductPrepack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductPrepack']))
			$model->attributes=$_GET['ProductPrepack'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductPrepack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductPrepack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductPrepack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-prepack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
