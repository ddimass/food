<?php

class Product_easyController extends Controller
{
	public $layout='//layouts/column2';
	public function actionIndex()
	{
	$model=new Product;
	if (isset($_POST['Product']))
	{
		$model->attributes=$_POST['Product'];
		$model->image=CUploadedFile::getInstance($model,'image');
		if ($model->save())
		{
		$model->image->saveAs('images/' . $model->image);
		$this->redirect(array('Product/admin'));
		}
	}
//		foreach ($_POST as $key => $value){
//			print_r "$_POST\r\n";
//			}
		$this->render('index',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
