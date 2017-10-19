<?php

class AjaxController extends Controller
{
	public function actionIndex()
	{
	$data = array();
	$data["myValue"] = "Loaded";
		$this->render('index', $data);
	}
	
	 public function actionAjax()
    {
//	$this->redirect(array('test'));
        $data = array();
        $data["myValue"] = "Content updated in AJAX";
	$data["myValue"] = $my;
        $this->renderPartial('_ajax', $data, false, true);
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
