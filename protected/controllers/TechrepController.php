<?php

class TechrepController extends Controller
{
	public function actionIndex()
	{
	$products = Product::model()->findall();
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('freeserif', 'B', 16);
	$html = 'Технологические карты';
	foreach ($products as $product) {
	$html .= '<table bordr="1">';
	
	$html .= '</table>';
	}

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