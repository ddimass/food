<?php

class Ingred_in_prodsController extends Controller
{
	public function actionIndex()
	{
	 $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
        $pdf->setPageOrientation("P");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('dejavusans', '', 12);
//        $pdf->SetAutoPageBreak(true,0);
        $pdf->setTopMargin(1.01);
        $pdf->AddPage();
        $sum_count = 0;
        $sum_cost = 0;
        $c = 0;
        $ingreds = Ingred::model()->findall();
        $prods = Product::model()->findall();
        $html = '<p align="center"><font size="16"><b>Отчёт по ингредиентам в составе продукта</b></font></p>';
        foreach ($ingreds as $ingred) {
        $html .= '<b>' . $ingred->name . '</b><br>';
        $html .= '<table cellspacing="0" cellpadding="2" border="1">';
        $html .= '<tr>';
        $html .= '<td width="250">';
        $html .= '<b> Входит в продукт </b>';
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= '<b> Кол-во </b>';
        $html .= '</td>';
        $html .= '</tr>';
        foreach ($prods as $prod) {
        $cou = 0;
        $pings = Product::ingcal($prod->id, 1);
        foreach ($pings as $ping) {
        foreach ($ping['ings'] as $ing) {
        if ($ing['iid'] == $ingred->id) {
        $cou = $cou + $ing['count']; } } }
        if ($cou) {
        $html .= '<tr>';
        $html .= '<td width="250">';
        $html .= $prod->name;
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= $cou;
        $html .= '</td>';
        $html .= '</tr>';
        }}
        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $html = '';
       $pdf->addpage();
        $pdf->setY(1.01);
        
        }


//        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('ingreds.pdf','I');


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
