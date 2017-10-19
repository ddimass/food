<?php

class ReportsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionProduct()
	{
	$products = Product::model()->findall();
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('freeserif', 'B', 16);
	$pdf->setAutoPageBreak(false);
	$dy=$pdf->getY();
	$x = $pdf->getX();
	$y = $dy;
	$ally = $y;
	$allx = $x;
	$pdf->multicell(9, 1, "Продукт", 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$pdf->multicell(4, $dy-$y, "Цена", 1, "L");
	$pdf->setXY($x+13,$y);
	$pdf->multicell(6, $dy-$y, "Себестоимость", 1, "L");

	$dy=$pdf->getY();
	$x = $pdf->getX();
//	$pdf->
	foreach ($products as $product) {
	$y = $dy;
	$pdf->setY($dy);
	$pdf->multicell(9, 1, $product->name, 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$pdf->multicell(4, $dy-$y,$product->price, 1, "L");
	$pdf->setXY($x+13,$y);
	$pdf->multicell(6, $dy-$y,$product->own_price, 1, "L");
	if ($pdf->getY() > 28) {
	$pdf->addpage();
	$dy = $ally;
	}
	} 
	$pdf->Output();

		$this->render('index');
	}
	public function actionOrders()
	{
	$orders = Order::model()->findall();
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 12);
	$html = '
	<table>
	<tr>
	<td style="width: 320px; border:1px solid #000">
	Номер клента
	</td>
	<td style="width: 50px; border:1px solid #000">
	Стоимость
	</td>
	<td style="width: 50px;border:1px solid #000">
	Скидка
	</td>
	</tr>';
	
	foreach ($orders as $order){
	$phon = Phones::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->phone;
	$dis = DiscountType::model()->findbypk($order->tbl_discount_type_id)->type;
	$html .= '
	<tr>
	<td style="width: 320px; border:1px solid #000">
	' . $phon . '
	</td>
	<td style="width: 50px; border:1px solid #000">
	' . $order->cost .  ' 
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $dis . '
	</td>
	</tr>
	';
	}
	$html .= '
	</table>';
	
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}
	public function actionCour()
	{
	$time1 = new DateTime("00:00:00");
	$time2 = new DateTime("05:00:00");
	$timenow = new DateTime("now");
	if (($timenow > $time1) and ($timenow < $time2)) {
	$date = date('Y-m-d'." 05:00:00",strtotime("-1 days"));
	$daten =  date("Y-m-d"." 05:00:00");
	}
	else {
	$date = date('Y-m-d'." 05:00:00");
	$daten =  date("Y-m-d"." 05:00:00", strtotime("+1 days"));
	}
	$crit = new CDbCriteria;
	$crit->addBetweencondition('date_time', $date, $daten, 'AND');
	$orders = Order::model()->findall($crit);
	$couriers = Courier::model()->findall();
	$or = array();
	foreach ($couriers as $courier) {
	    $clsum = 0;
	    $clcount = 0;
	    $ar = array();
	    foreach($orders as $order) {
	    if (($courier->id == $order->tbl_courier_id) && ($order->tbl_state_id == 4)) {
	    $clcount = $clcount + 1;
	    $clsum = $clsum + $order->cost;
	    }
	    }
	    $ar = array(
	    'id' => $courier->id,
	    'count' => $clcount,
	    'sum' => $clsum,
	    );
	    array_push($or,$ar);
	}
	$session = Yii::app()->session;
	$session['post'] = $or;
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
//	$pdf->setPageOrientation("L");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 16);
	$html = 'Отчёт за: '. date("Y-m-d")  . '<br>';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td > Курьер';
	$html .= '</td>';
	$html .= '<td> Заказы';
	$html .= '</td>';
	$html .= '<td> Сумма';
	$html .= '</td>';
	$html .= '<td> К выдаче';
	$html .= '</td>';
	$html .= '<td> Получил';
	$html .= '</td>';
	$html .= '</tr>';

	foreach ($or as $ors) {
//	$session['post'] = $or["$i"];
	if ($ors["id"]>2 && $ors["sum"]>0) {
	$cour = Courier::model()->findbypk($ors["id"])->name;
	$out = $ors["sum"] * 0.25;
	$html .= '<tr>';
	$html .= '<td>' . $cour;
	$html .= '</td>';
	$html .= '<td>' . $ors["count"];
	$html .= '</td>';
	$html .= '<td>' . $ors["sum"];
	$html .= '</td>';
	$html .= '<td>' . $out;
	$html .= '</td>';
	$html .= '<td>';
	$html .= '</td>';
	$html .= '</tr>';
	}
	}
	$html .= '</table>';
//	$html = iconv("windows-1251","utf-8", $html);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}
	public function actionOrderday()
	{
	$time1 = new DateTime("00:00:00");
	$time2 = new DateTime("05:00:00");
	$timenow = new DateTime("now");
	if (($timenow > $time1) and ($timenow < $time2)) {
	$date = date('Y-m-d'." 05:00:00",strtotime("-1 days"));
	$daten =  date("Y-m-d"." 05:00:00");
	}
	else {
	$date = date('Y-m-d'." 05:00:00");
	$daten =  date("Y-m-d"." 05:00:00", strtotime("+1 days"));
	}
	
//	$date = date_format(echo $date,'Y-m-d');
	$crit = new CDbCriteria;
	$crit->addBetweencondition('date_time', $date, $daten, 'AND');
	$orders = Order::model()->findall($crit);
//	$session = Yii::app()->session;
//	$session['post']=$orders;
	//$id = 5;
//	$order = Order::model()->findbypk($id);
	$sum = 0;
	$suma = 0;
	$sumco = 0;
	$count = 0;
	$count3 = 0;
	$count5 = 0;
	$count10 = 0;
	$count20 = 0;
	$count70 = 0;
	$countco = 0;
	$sumwc = 0;
	foreach($orders as $order) {
	if ($order->tbl_state_id==4) {
	$count = $count + 1;
	$sum = $sum + $order->cost;
	if ($order->tbl_courier_id==1){
	$count10 = $count10 + 1;
	$sumwc = $sumwc + $order->cost;
	} else {
	$countco = $countco + 1;
	$sumco = $sumco + $order->cost;
	}
	$products = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id));
	foreach($products as $product) {
	$suma = $suma + Product::model()->findbypk($product->tbl_product_id)->price * $product->count;
	}
	}
	}
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("L");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 12);
	$html = 'Отчёт за: '. $date  . '<br>';
//	$html .= var_dump($time2).'<br>';
	$html .= '=========================================================<br>';
	$html .= 'Общая выручка за день: '. $sum . '<br>';
	$html .= 'Общая выручка за день (без скидки): '. $suma . '<br>';
	$html .= 'Количество заказов: '. $count . '<br>';
	$html .= '=========================================================<br>';
	
	$html .= 'Общая выручка за день (ЗАЛ): '. $sumwc . '<br>';
	$html .= 'Количество заказов (ЗАЛ): '. $count10 . '<br>';

	$html .= '=========================================================<br>';

	$html .= 'Общая выручка за день (Курьеры): '. $sumco . '<br>';
	$html .= 'Количество заказов (Курьеры): '. $countco . '<br>';

//	$html .= 'Со скидкой 3%: ' . $count3 . '<br>';
//	$html .= 'Со скидкой 5%: ' . $count5 . '<br>';
//	$html .= 'Со скидкой 7%: ' . $count . '<br>';
//	$html .= 'Со скидкой 10%: ' . $count10 . '<br>';
//	$html .= 'Со скидкой 20%: ' . $count20 . '<br>';
//	$html .= 'Со скидкой 70%: ' . $count70 . '<br>';
//	$html = iconv("windows-1251","utf-8", $html);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}
	
	
	
	
	
	
	public function actionOrderdaydir()
	{
	$date = $_POST['day'] . " 05:00:00";
	$daten =  $_POST['dayn'] . " 05:00:00";
	$datee = $date;
	$ii=1;
//	$date = date_format(echo $date,'Y-m-d');
	$crit = new CDbCriteria;
	$crit->addBetweencondition('date_time', $date, $daten, 'AND');
	$orders = Order::model()->findall($crit);
//	$session = Yii::app()->session;
//	$session['post']=$orders;
	//$id = 5;
//	$order = Order::model()->findbypk($id);
	$sum = 0;
	$suma = 0;
	$count = 0;
	$count3 = 0;
	$count5 = 0;
	$count10 = 0;
	$count20 = 0;
	$count70 = 0;
	foreach($orders as $order) {
	if ($order->tbl_state_id==4) {
	$count = $count + 1;
	$sum = $sum + $order->cost;
	if ($order->tbl_courier_id==2){$count10 = $count10 +1;} else {
	if ($order->tbl_discount_type_id==2){$count3 = $count3 +1;} 
	if ($order->tbl_discount_type_id==3){$count5 = $count5 +1;} 
	if ($order->tbl_discount_type_id==4){$count10 = $count10 +1;}  
	if ($order->tbl_discount_type_id==5){$count20 = $count20 +1;} 
	if ($order->tbl_discount_type_id==6){$count20 = $count20 +1;} 
	if ($order->tbl_discount_type_id==7){$count70 = $count70 +1;} 
	if ($order->tbl_discount_type_id==8){$count20 = $count20 +1;}
	}
	$products = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id));
	foreach($products as $product) {
	$suma = $suma + Product::model()->findbypk($product->tbl_product_id)->price * $product->count;
	}
	}
	}
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 12);
	$html = 'Отчёт с: '. $date  . ' по: ' . $daten . '<br>';
	$html .= 'Общая выручка за день: '. $sum . '<br>';
	$html .= 'Общая выручка за день (без скидки): '. $suma . '<br>';
	$html .= 'Количество заказов: '. $count . '<br>';
	$html .= 'Со скидкой 3%: ' . $count3 . '<br>';
	$html .= 'Со скидкой 5%: ' . $count5 . '<br>';
//	$html .= 'Со скидкой 7%: ' . $count . '<br>';
	$html .= 'Со скидкой 10%: ' . $count10 . '<br>';
	$html .= 'Со скидкой 20%: ' . $count20 . '<br>';
	$html .= 'Со скидкой 70%: ' . $count70 . '<br>';
	while ($datee != $daten) {
	$html .= 'IIIII: ' . $datee . '<br>';
	$datee = date("Y-m-d H:i:s", strtotime("$datee +1 days"));
	}

	

//	$html = iconv("windows-1251","utf-8", $html);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}
	
	
	
	
	public function actionOrder()
	{
	$id = $_GET['id'];
	//$id = 5;
	$order = Order::model()->findbypk($id);
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
//	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->setFontSubsetting(false);
	/*
	$pdf->setAutoPageBreak(false);
	$dy=$pdf->getY();
	$x = $pdf->getX();
	$y = $dy;
	$ally = $y;
	$allx = $x; */
	$html = '<div align="center"><img style="float: left;" width="100px" src="images/logo.JPG"> Доставка суши с 11.00 до 23.00: (4012) 777850 <br> г.Калининград ул. Ген. Челнокова 40.</div>';
//	$html .= 'sdfsd';
	$html .='<div width = "100%" style="text-align: center;"><h3>Заказ № '. $id . '</h3></div>';
	$date = date("Y-m-d H:i:s" ,strtotime($order->date_time)+(60*50));
	$html .='<div width = "100%" style="text-align: left;">Дата: ' . $order->date_time . '   Время доставки: 00:50   Доставить до: ' . $date .'
	</div>';
	
	$html .= 'Клиент: ' . Clients::model()->findbypk($order->tbl_client_id)->name.'<br>';
	$html .= 'Телефон: ' . Phones::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->phone.'<br>';
	$pdf->SetFont('dejavusans', 'B', 14);
	$html .= 'Адрес: <h4>' . Address::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->address.'</h4>';
	$pdf->SetFont('dejavusans', '', 12);
	$html .= 'Примечания: ' . $order->description.'<br>';
	$html .= 'Тип оплаты: Наличные<br>';
	$html .= '<br><br>
	<table>
	<tr>
	<td style="width: 20px; border:1px solid #000">
	№
	</td>
	<td style="width: 350px; border:1px solid #000">
	Наименование
	</td>
	<td style="width: 50px;border:1px solid #000">
	Кол-во
	</td>
	<td style="width: 50px;border:1px solid #000">
	Цена
	</td>
	<td style="width: 50px;border:1px solid #000">
	Сумма
	</td>
	</tr>';
	$ordliss = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id));
	$i=0;
	$sum = 0;
	if ($order->cash > 0 ) {
	$minus = $order->cash - $order->cost;
	} else {$minus =0;}
	foreach ($ordliss as $ordlis){
	$i= $i+1;
	$prod = Product::model()->findbypk($ordlis->tbl_product_id);
	$cost = $prod->price * $ordlis->count;
	$sum = $sum + $cost;
	$saless = $sum - $order->cost;
	$html .= '
	<tr>
	<td style="width: 20px; border:1px solid #000">
	' . $i . '
	</td>
	<td style="width: 350px; border:1px solid #000">
	' . $prod->name . '
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $ordlis->count . '
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $prod->price . '
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $cost . '
	</td>
	</tr>
	';
	}
	$html .= '
	<tr>
	<td style="width: 20px; border:0px solid #000">
	
	</td>
	<td style="width: 350px; border:0px solid #000">
	Сумма заказа:
	</td>
	<td style="width: 50px;border:0px solid #000">
	
	</td>
	<td style="width: 50px;border:1px solid #000">
	 
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $sum . '
	</td>
	</tr>
	<tr>
	<td style="width: 20px; border:0px solid #000">
	
	</td>
	<td style="width: 350px; border:0px solid #000">
	Сумма заказа с учётом скидок:
	</td>
	<td style="width: 50px;border:0px solid #000">
	
	</td>
	<td style="width: 50px;border:1px solid #000">
	 
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $order->cost . '
	</td>
	</tr>
 	<tr>
	<td style="width: 20px; border:0px solid #000">
	
	</td>
	<td style="width: 350px; border:0px solid #000">
	Сдача с ' . $order->cash . ' :
	</td>
	<td style="width: 50px;border:0px solid #000">
	
	</td>
	<td style="width: 50px;border:1px solid #000">
	 
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $minus . '
	</td>
	</tr>
	<tr>
	<td style="width: 20px; border:0px solid #000">
	
	</td>
	<td style="width: 350px; border:0px solid #000">
	Ваша скидка :
	</td>
	<td style="width: 50px;border:0px solid #000">
	
	</td>
	<td style="width: 50px;border:1px solid #000">
	 
	</td>
	<td style="width: 50px;border:1px solid #000">
	' . $saless . '
	</td>
	</tr>'; 
	$html .= '
	</table>
	<p>Вознаграждение курьера приветствуется, но остаётся на Ваше усмотрение.</p>
	<p>Если у Вас возникли какие-либо пожелания, предложения или замечания по поводу Вашего заказа, пожалуйста, информируйте администратора группы VKONTAKTE: vk.com/yaponchik777850</p>
	 ';
	$html .= '____________________________________________________________________________';
//	$html = iconv("windows-1251","utf-8", $html);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}
	public function actionTech()
	{
	$products = Product::model()->findall();
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('freeserif', 'B', 16);
	$pdf->setAutoPageBreak(false);
	$dy=$pdf->getY();
	$x = $pdf->getX();
	$y = $dy;
	$ally = $y;
	$allx = $x;
//	$session=Yii::app()->session;
//	$session['post']=$product;
foreach($products as $product) {
	$pdf->multicell(9, 1, "Продукт", 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	// $pdf->multicell(4, $dy-$y, "" , 1, "L");
	// $pdf->setXY($x+13,$y);
	$pdf->multicell(10, $dy-$y, "Себестоимость", 1, "L");
	$dy=$pdf->getY();
	$x = $pdf->getX();
	$y = $dy;
	$pdf->multicell(9, 1, $product->name, 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	// $pdf->multicell(4, $dy-$y, "" , 1, "L");
	// $pdf->setXY($x+13,$y);
	$pdf->multicell(10, $dy-$y, $product->own_price, 1, "L");
	$dy=$pdf->getY();
	$x = $pdf->getX();
//	$pdf->
	$preps = Product::ingcal($product->id, 1);
	$sum = 0;
	$cst = 0;
	foreach ($preps as $prep) {
//	if (defined($prep['prid'])) {
	$y = $dy;
	$pdf->setY($dy);
	$prepack1 = Prepack::model()->findbypk($prep['prid']);
	$pdf->multicell(9, 1, "Полуфабрикат", 1, "L");
	$dy = $pdf->getY();
//	$y = $dy;
	$pdf->setXY($x+9,$y);
	$pdf->multicell(4, $dy-$y,"Выход", 1, "L");
	$pdf->setXY($x+13,$y);
	$pdf->multicell(6, $dy-$y,"Нужно в Гр.", 1, "L");
	$y = $dy;
	$pdf->setY($dy);
//	$session=Yii::app()->session;
//	$session['post']=$prep['prid'];
	$prepack1 = Prepack::model()->findbypk($prep['prid']);
	$pdf->multicell(9, 1, $prepack1->name, 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$pdf->multicell(4, $dy-$y,$prepack1->out, 1, "L");
	$pdf->setXY($x+13,$y);
	$we = $prep['count'] * 1000;
	$sum = $sum + $we;
	$pdf->multicell(6, $dy-$y,$we, 1, "L");
	$y = $dy;
	$pdf->setY($dy);
	//$ingredi = Ingred::model()->findbypk($iid['iid']);
//	$pdf->multicell(9, 1, "Ингредиент", 1, "L");
//	$dy = $pdf->getY();
//	$pdf->setXY($x+9,$y);
//	$pdf->multicell(4, $dy-$y, "Остаток", 1, "L");
//	$pdf->setXY($x+13,$y);
//	$pdf->multicell(6, $dy-$y,"Нужно", 1, "L");

	foreach ($prep['ings'] as $iid) {
	
	$y = $dy;
	$pdf->setY($dy);
	$ingredi = Ingred::model()->findbypk($iid['iid']);
	$pdf->multicell(9, 1, $ingredi->name, 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$opr = $iid['own_price'] . ' руб';
	$cst = $cst + $iid['own_price'];
	$pdf->multicell(4, $dy-$y,$opr, 1, "L");
	$pdf->setXY($x+13,$y);
	$we = $iid['count'] * 1000;
	$pdf->multicell(6, $dy-$y, $we, 1, "L");
	}
//	}
	/*
	else {
	$y = $dy;
	$pdf->setY($dy);
	// $prepack1 = Prepack::model()->findbypk($prep->prid);
	$ingredi = Ingred::model()->findbypk($prep->iid);
	$pdf->multicell(9, 1, $ingredi->name, 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$pdf->multicell(4, $dy-$y,$ingredi->count, 1, "L");
	$pdf->setXY($x+13,$y);
	$pdf->multicell(6, $dy-$y,$prep->count, 1, "L");
	} */
	}
	$y = $dy;
	$pdf->setY($dy);
	$pdf->multicell(9, 1, "Итого", 1, "L");
	$dy = $pdf->getY();
	$pdf->setXY($x+9,$y);
	$opr1 = $cst . ' руб';
	$pdf->multicell(4, $dy-$y,$opr1, 1, "L");
	$pdf->setXY($x+13,$y);
	$pdf->multicell(6, $dy-$y, $sum, 1, "L");
	$pdf->addpage();
	$dy = $ally;
	$y = $dy;
	} 
	$pdf->Output();

	//	$this->render('index');
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	public function actionRevis()
	{
	$date = date('Y-m-d');
	i::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
        $pdf->setPageOrientation("P");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
	$dates = $_POST['dates'];
	$daten = $_POST['daten'];
//	$daten =  date("Y-m-d", strtotime("+1 days"));
//	$date = date_format(echo $date,'Y-m-d');
//	$crit = new CDbCriteria;
//	$crit->addBetweencondition('date_time', $date, '2014-01-30', 'AND');
	$width = 210;
	$height = 290;

	$custom_layout = array($width,$height);
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
//	$width = 210;
//	$height = 700;
		
//	$pdf->reformat("custom",'P');
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->SetAutoPageBreak(true,0);
	$pdf->setTopMargin(0.01);
	$pdf->AddPage();
	
	$ingreds = Ingred::model()->findall();
	$count = 0;
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->SetAutoPageBreak(true,0);
        $pdf->setTopMargin(0.01);
        $pdf->AddPage();

	$html = '<div style="page-break-inside:avoid;"> <br><br>';
	$html .= '<table cellspacing="0" cellpadding="2" border="1">';
        $html = '<div style="page-break-inside:avoid;"> <br><br>';
        $html .= '<table cellspacing="0" cellpadding="2" border="1">';
        $html .= '<tr>';
        $html .= '<td height="20" width="30">';
        $html .= '№';
        $html .= '</td>';
        $html .= '<td width="170">';
        $html .= 'Ингредиент';
        $html .= '</td>';
        $html .= '<td>';
        $html .= 'Продано';
        $html .= '</td>';
        $html .= '<td>';
        $html .= 'Остаток';
        $html .= '</td>';
        $html .= '<td>';
        $html .= 'Стоимость ост.';
        $html .= '</td>';
        $html .= '<td>';
	$html .= '<tr>';
	$html .= '<td height="20" width="30">';
	$html .= '№';
	$html .= '</td>';
	$html .= '<td width="170">';
	$html .= 'Ингредиент';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Продано';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Остаток';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Стоимость ост.';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Наличие';
	$html .= '</td>';
	$html .= '</tr>';

	$html .= '';
	$ingreds = Ingred::model()->findall();
	$count = 0;
	foreach($ingreds as $ingred) {
	$count = $count + 1;
	$prod = Ingred::amountd($ingred->id,$dates,$daten);
	$amount = $ingred->amount - $prod;
	if ($ingred->amount !=0) {
	$cost = $amount * $ingred->cost / $ingred->amount;
	} else {$cost=0;}
	$html .= '<tr>';
	$html .= '<td>';
	$html .= $count;
	$html .= '</td>';
	$html .= '<td>';
	$html .= $ingred->name;
	$html .= '</td>';
	$html .= '<td>';
	$html .= $prod;
	$html .= '</td>';
	$html .= '<td>';
	$html .= $amount;
	$html .= '</td>';
	$html .= '<td>';
	$html .= $cost;
	$html .= '</td>';
	$html .= '<td>';
	$html .= '';
	$html .= '</td>';
	$html .= '</tr>';
	}
	$html .='</table>';
	$html .='</div>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('revision.pdf','I');
	}
	

	public function actionReviscl()
	{
	$date = date('Y-m-d');
//	$daten =  date("Y-m-d", strtotime("+1 days"));
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('revision.pdf','I');
//	$date = date_format(echo $date,'Y-m-d');
//	$crit = new CDbCriteria;
//	$crit->addBetweencondition('date_time', $date, '2014-01-30', 'AND');
	$width = 210;
	$height = 290;

	$custom_layout = array($width,$height);
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'Legal', true, 'UTF-8', false);
	$pdf->setPageOrientation("P");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
//	$width = 210;
//	$height = 700;
		
//	$pdf->reformat("custom",'P');
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->SetAutoPageBreak(true,0);
	$pdf->setTopMargin(0.01);
	$pdf->AddPage();
	
		$ingreds = Ingred::model()->findall();
	$count = 0;
	$html = '<div style="page-break-inside:avoid;"> <br><br>';
	$html .= '<table cellspacing="0" cellpadding="2" border="1">';
	$html .= '<tr>';
	$html .= '<td height="20" width="30">';
	$html .= '№';
	$html .= '</td>';
	$html .= '<td width="170">';
	$html .= 'Ингредиент';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Продано';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Остаток';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Стоимость ост.';
	$html .= '</td>';
	$html .= '<td>';
	$html .= 'Наличие';
	$html .= '</td>';
	$html .= '</tr>';

	$html .= '';
	$ingreds = Ingred::model()->findall();
	$count = 0;
	foreach($ingreds as $ingred) {
	$count = $count + 1;
	$prod = Ingred::amount($ingred->id);
	$amount = $ingred->amount - $prod;
	if ($ingred->amount !=0) {
	$cost = $amount * $ingred->cost / $ingred->amount;
	} else {$cost=0;}
	$html .= '<tr>';
	$html .= '<td>';
	$html .= $count;
	$html .= '</td>';
	$html .= '<td>';
	$html .= $ingred->name;
	$html .= '</td>';
	$html .= '<td>';
	$html .= '';
	$html .= '</td>';
	$html .= '<td>';
	$html .= '';
	$html .= '</td>';
	$html .= '<td>';
	$html .= '';
	$html .= '</td>';
	$html .= '<td>';
	$html .= '';
	$html .= '</td>';
	$html .= '</tr>';
	}
	$html .='</table>';
	$html .='</div>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('revision.pdf','I');
	}
	
	
	

	





	public function actionOrderdayp()
	{
	$time1 = new DateTime("00:00:00");
	$time2 = new DateTime("05:00:00");
	$timenow = new DateTime("now");
	if (($timenow > $time1) and ($timenow < $time2)) {
	$date = date('Y-m-d'." 05:00:00",strtotime("-1 days"));
	$daten =  date("Y-m-d"." 05:00:00");
	}
	else {
	$date = date('Y-m-d'." 05:00:00");
	$daten =  date("Y-m-d"." 05:00:00", strtotime("+1 days"));
	}
	
//	$date = date_format(echo $date,'Y-m-d');
	$crit = new CDbCriteria;
	$crit->addBetweencondition('date_time', $date, $daten, 'AND');
	$orders = Order::model()->findall($crit);
//	$session = Yii::app()->session;
//	$session['post']=$orders;
	//$id = 5;
//	$order = Order::model()->findbypk($id);
	$sum = 0;
	$suma = 0;
	$sumco = 0;
	$count = 0;
	$count3 = 0;
	$count5 = 0;
	$count10 = 0;
	$count20 = 0;
	$count70 = 0;
	$countco = 0;
	$sumwc = 0;
	foreach($orders as $order) {
	if ($order->tbl_state_id==4) {
	$count = $count + 1;
	$sum = $sum + $order->cost;
	if ($order->tbl_courier_id==1){
	$count10 = $count10 + 1;
	$sumwc = $sumwc + $order->cost;
	} else {
	$countco = $countco + 1;
	$sumco = $sumco + $order->cost;
	}
	$products = OrderList::model()->findallbyattributes(array('tbl_order_id'=>$order->id));
	foreach($products as $product) {
	$suma = $suma + Product::model()->findbypk($product->tbl_product_id)->price * $product->count;
	}
	}
	}
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
	$pdf->setPageOrientation("L");
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AddPage();
//	$pdf = iconv("windows-1251","utf-8",$pdf);
	$pdf->SetFont('dejavusans', '', 12);
	$html = 'Отчёт за: '. $date  . '<br>';
//	$html .= var_dump($time2).'<br>';
	$html .= '=========================================================<br>';
	$html .= 'Общая выручка за день: '. $sum . '<br>';
	$html .= 'Общая выручка за день (без скидки): '. $suma . '<br>';
	$html .= 'Количество заказов: '. $count . '<br>';
	$html .= '=========================================================<br>';
	
	$html .= 'Общая выручка за день (ЗАЛ): '. $sumwc . '<br>';
	$html .= 'Количество заказов (ЗАЛ): '. $count10 . '<br>';

	$html .= '=========================================================<br>';

	$html .= 'Общая выручка за день (Курьеры): '. $sumco . '<br>';
	$html .= 'Количество заказов (Курьеры): '. $countco . '<br>';

//	$html .= 'Со скидкой 3%: ' . $count3 . '<br>';
//	$html .= 'Со скидкой 5%: ' . $count5 . '<br>';
//	$html .= 'Со скидкой 7%: ' . $count . '<br>';
//	$html .= 'Со скидкой 10%: ' . $count10 . '<br>';
//	$html .= 'Со скидкой 20%: ' . $count20 . '<br>';
//	$html .= 'Со скидкой 70%: ' . $count70 . '<br>';
//	$html = iconv("windows-1251","utf-8", $html);
	$js = 'print();';

	$pdf->IncludeJS($js);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('order.pdf','I');
	}

}
