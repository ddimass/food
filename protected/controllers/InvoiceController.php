<?php

class InvoiceController extends Controller
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
				'users'=>array('@'),
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
		$model=new Invoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			$model->save();
//				$this->redirect(array('view','id'=>$model->id));
		}
		if(isset($_POST['IngredInvoice']))
		{
		foreach ($_POST['IngredInvoice'] as $ii) {
	//	$this->redirect(array('test/index'));
		$ingredinv = new IngredInvoice;
		$ingred = Ingred::model()->findbypk($ii['tbl_ingred_id']);
		$ingred->cost = $ingred->cost + $ii['cost'];
		$ingred->amount = $ingred->amount + $ii['count'] * CountIn::model()->findbypk($ingred->tbl_count_in_id)->count;
	//	$session = Yii::app()->session;
	//	$session['post'] = $ingred;
	//	$this->redirect(array('test/index'));
		$ingredinv->tbl_invoice_id = $model->id;
		$ingredinv->tbl_ingred_id = $ii['tbl_ingred_id'];
		$ingredinv->count = $ii['count'];
		$ingredinv->cost = $ii['cost'];
//			$model->attributes=$_POST['Invoice'];
			$ingredinv->save(false);
			$ingred->save(false);
		
		}
		
		}
		if (isset($_POST['IngredInvoice']) or isset($_POST['Invoice'])) {$this->redirect(array('admin'));}
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
		$inginvs = IngredInvoice::model()->findallbyattributes(array('tbl_invoice_id'=>$id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
	//		$model->attributes=$_POST['Invoice'];
			if(!trim($_POST['Invoice']['date'])==''){$model->date = $_POST['Invoice']['date'];}
			if(!trim($_POST['Invoice']['number'])==''){$model->number = $_POST['Invoice']['number'];}
			if(!trim($_POST['Invoice']['tbl_provider_id'])==''){$model->tbl_provider_id = $_POST['Invoice']['tbl_provider_id'];}
			$model->save();
	//			$this->redirect(array('admin'));
		}
		
		if(isset($_POST['IngredInvoice']))
		{
		$inginvs = IngredInvoice::model()->findallbyattributes(array('tbl_invoice_id'=>$model->id));
		foreach ($inginvs as $inginv) {
		$ing = Ingred::model()->findbypk($inginv->tbl_ingred_id);
		$ing->amount = $ing->amount - $inginv->count * CountIn::model()->findbypk($ing->tbl_count_in_id)->count;
		$ing->cost = $ing->cost - $inginv->cost;
		$ing->save(false); 
		}
		IngredInvoice::model()->deleteallbyattributes(array('tbl_invoice_id'=>$model->id));
		foreach ($_POST['IngredInvoice'] as $ii) {
	//	$this->redirect(array('test/index'));
		$ingredinv = new IngredInvoice;
		$ingred = Ingred::model()->findbypk($ii['tbl_ingred_id']);
		$ingred->cost = $ingred->cost + $ii['cost'];
		$ingred->amount = $ingred->amount + $ii['count'] * CountIn::model()->findbypk($ingred->tbl_count_in_id)->count;
		$ingredinv->tbl_invoice_id = $model->id;
		$ingredinv->tbl_ingred_id = $ii['tbl_ingred_id'];
		$ingredinv->count = $ii['count'];
		$ingredinv->cost = $ii['cost'];
//			$model->attributes=$_POST['Invoice'];
			$ingredinv->save();
			$ingred->save(false);
//				$this->redirect(array('view','id'=>$model->id));
		}
		}

		if(isset($_POST['IngredInvoice']) or isset($_POST['Invoice'])) {$this->redirect(array('admin'));}
		$this->render('update',array(
			'model'=>$model,
			'inginvs'=>$inginvs,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$inginvs = IngredInvoice::model()->findallbyattributes(array('tbl_invoice_id'=>$id));
		foreach ($inginvs as $inginv) {
		$ing = Ingred::model()->findbypk($inginv->tbl_ingred_id);
		$ing->amount = $ing->amount - $inginv->count * CountIn::model()->findbypk($ing->tbl_count_in_id)->count;
		$ing->cost = $ing->cost - $inginv->cost;
		$ing->save(false); 
		}
		IngredInvoice::model()->deleteallbyattributes(array('tbl_invoice_id'=>$id));
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
		$dataProvider=new CActiveDataProvider('Invoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Invoice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Invoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Invoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
