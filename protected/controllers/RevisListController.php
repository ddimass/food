<?php

class RevisListController extends Controller
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
				'actions'=>array('adminadd','addcount','index','view'),
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
		$model=new RevisList;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RevisList']))
		{
			$model->attributes=$_POST['RevisList'];
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

		if(isset($_POST['RevisList']))
		{
			$model->attributes=$_POST['RevisList'];
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
	RevisList::model()->deleteallbyattributes(array('tbl_revis_id'=>$id));
	Revis::model()->deletebypk($id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RevisList');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdminadd()
	{
		$ingreds = Ingred::model()->findall();
//		Revis::model()->deleteall();
//		RevisList::model()->deleteall();
		$revis = new Revis;
		$revis->dt = new CDbExpression('NOW()');
		$revis->user = Yii::app()->user->id;
		$revis->place_id = 0;
		$revis->save(false);
		foreach ($ingreds as $ingred) {
		$revislist = new RevisList;
		$revislist->tbl_revis_id = $revis->id;
		$revislist->tbl_ingred_id = $ingred->id;
		$coco = IngredInvoice::calc_cost_count($ingred->id);
		$revislist->cost = $coco['cost'];
		$revislist->count = $coco['count'] - OrderIngred::calc($ingred->id);
		$revislist->save(false);
		}
		$model=new RevisList('search');
		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RevisList the loaded model
	 * @throws CHttpException
	 */

	public function actionAdmin($id)
	{
		
		$model=new RevisList('search');
		$model->unsetAttributes();  // clear any default valu
		if(isset($_GET['RevisList']))
		$model->attributes=$_GET['RevisList'];
		$model->tbl_revis_id = $id;
//		echo "Revision";
		$this->render('admin',array(
			'model'=>$model,
		));

	}
	public function actionAddcount()
	{
	$id = $_POST['id'];
	$count = $_POST['count'];
//	$id = 2732;
//	$count = 9;
//	$session = Yii::app()->session;
//	$session['add'] = array('id'=>$id,'count'=>$count);
	$rev = RevisList::model()->findbypk($id);
//	sleep(2);
	$rev->count_in=$count;
	$rev->margin = $count - $rev->count;
	$rev->save(false);
//	echo '111';
//	sleep(2);
//	$model=new RevisList;
	$model = new RevisList;
	echo $this->renderpartial('_admin',array('model'=>$model), true);
	}
	public function loadModel($id)
	{
		$model=RevisList::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RevisList $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='revis-list-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
