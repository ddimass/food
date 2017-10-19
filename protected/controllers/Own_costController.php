<?php

class Own_costController extends Controller
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
//        $html = '<div style="page-break-inside:avoid;"> <br><br>';
	$prods = Product::model()->findall();
	$html = '<p align="center"><font size="16"><b>Расчёт себестоимости блюд</b></font></p>';
	foreach ($prods as $prod) {
//	if ($c == 2) {$c = 0;   $pdf->AddPage();}
//	$c = $c + 1;
	$sum_count = 0;
	$sum_cost = 0;
	$c = 0;
        $html .= '<table cellspacing="0" cellpadding="2" border="1">';
        $html .= '<tr>';
        $html .= '<td width="250">';
        $html .= '<b>' . $prod->name . '</b>';
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= '<b> Вес нетто </b>';
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= '<b>Вес брутто</b>';
        $html .= '</td>';
        $html .= '<td width="120">';
        $html .= '<b>С/с блюда, руб.</b>';
        $html .= '</td>';
        $html .= '</tr>';
        $ingreds = Product::ingcal($prod->id, 1);
        foreach ($ingreds as $ingred) {
	$prep = Prepack::model()->findbypk($ingred['prid']);
	$prepc = PrepackPrepack::model()->findallbyattributes(array('tbl_prepack_id'=>$ingred['prid']));
	$ingredc = PrepackIngred::model()->findallbyattributes(array('tbl_prepack_id'=>$ingred['prid']));
        $html .= '<tr>';
        $html .= '<td width="250" colspan="3">';
        $html .= '<i>' . $prep->name . '</i>';
        $html .= '</td>';
//        $html .= $prep->name;
        $html .= '</tr>';
	foreach ($ingred['ings'] as $ing) {
	if ((!count($prepc)) and (count($ingredc)==1)) {
	$ing_need = PrepackIngred::model()->findbyattributes(array('tbl_prepack_id'=>$prep->id,'tbl_ingred_id'=>$ing['iid']));
	$ing_count = $prep->out * $ing['count'] / $ing_need->count; } else {$ing_count = $ing['count'];}
	$sum_count = $sum_count + $ing['count'];
	$sum_cost = $sum_cost + $ing['own_price'];
	$c = $c + $ing_count;
	$html .= '<tr>';
        $html .= '<td width="250">';
        $html .= Ingred::model()->findbypk($ing['iid'])->name;
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= round($ing_count, 5);
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= $ing['count'];
        $html .= '</td>';
        $html .= '<td width="120">';
        $html .= $ing['own_price'];
        $html .= '</td>';
        $html .= '</tr>';
        }
        }
        $html .= '<tr>';
        $html .= '<td width="250">';
        $html .= '<b>Итого</b>';
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= '<b>' . round($c, 5) . '</b>';
        $html .= '</td>';
        $html .= '<td width="80">';
        $html .= '<b>' . $sum_count . '</b>';
        $html .= '</td>';
        $html .= '<td width="120">';
        $html .= '<b>' . $sum_cost . '</b>';
        $html .= '</td>';
        $html .= '</tr>';

        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $html = '';
       $pdf->addpage();
       	$pdf->setY(1.01);

        $html .= '<br>';
        $html .= '<br>';

        }
//        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('cost.pdf','I');




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
