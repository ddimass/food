<?php
Yii::import('ext.runactions.components.ERunActions');

class BackController extends Controller
{
public function actionIndex()
	{
	
	if (ERunActions::runBackground())
        {
	echo "OKPO";
	Yii::log('sadfdasfasfadf');
	$se = Yii::app()->session;        
	$se['back'] = '10';
        sleep(5);
	$se['back'] = '100';
        
           //do all the stuff that should work in background
           //mail->send() ....
        Yii::app()->end();
        }
        $se = Yii::app()->session;        
	$se['back'] = '10';

	Yii::log('121sa-----------------------------------', CLogger::LEVEL_ERROR);
	$this->render('index');
}
	public function actiongetStatus()
	{
	$se = Yii::app()->session;
	echo json_encode($se['back']);
	Yii::app()->end();
	}
	
	public function actionIn()
	{
	$se = Yii::app()->session;
	$se['back'] = $this->createAbsoluteUrl('back/index');
	Yii::log('121sa-----------------------------------', CLogger::LEVEL_ERROR);

	ERunActions::touchUrl($this->createAbsoluteUrl('back/index'));
	$this->render('index');
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
