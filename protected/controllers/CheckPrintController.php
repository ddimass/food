<?php

class CheckPrintController extends Controller
{
	public function actionIndex1()
	{
        $id = $_GET['id'];
        //$id = 5;
        $order = Order::model()->findbypk($id);
        $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
//      $pdf->setPageOrientation("P");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetMargins(0,0,0, true);
        $pdf->setPrintHeader(false);
        $prefer = array(
        'PrintScaling'=>'None',
        );
        $pdf->setViewerPreferences($prefer);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
//      $pdf = iconv("windows-1251","utf-8",$pdf);
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->setFontSubsetting(false);
//        $date = date("Y-m-d H:i:s" ,strtotime($order->date_time)+(60*50));
	$htm = '<table width="80mm" style="max-width:80mm;">
	<tr>
	<td style="text-align:center;">
	<img width="50mm" src="images/logo.jpg">
	<h2>777040</h2><br>
	<h3>С 11.00 до 01.00</h3>
	ул. Фрунзе 87-89 <br>
	</td>
	</tr>
	<tr>
	<td>
	Заказ №' . $id . ' | ' . $order->date_time . '<br>
	Клиент: ' . Clients::model()->findbypk($order->tbl_client_id)->name . '<br>
	Телефон: ' . Phones::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->phone . '<br>
	Адрес: <br>' .
	Address::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->address . '<br>
	Тип оплаты: Наличные <br>
	Курьер: ' . Courier::model()->findbypk($order->tbl_courier_id)->name . '<br>
	___________________________________<br>
	Наименование Кол-во Стоимость
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
        $htm .= '
        <tr>
        <td> ' .
        $prod->name . ' &nbsp; &nbsp;' . $ordlis->count . ' &nbsp; &nbsp;' . $cost . '
        </td>
        </tr>';
        }
	$htm .= '
	<tr>
	<td>
	___________________________________<br>
<br>
	Сумма заказа: ' . $order->cost . '<br>
	Сдача с '. $order->cash . ': ' . $minus . '<br>
	<br>
		Примечания: ' . $order->description . '<br>

	<font size="8">Департамент сервиса: 89521179784
	Вознаграждение курьера приветствуется, но остаётся на ваше усмотрение.
	</font></td>
	</tr>
	<table>
	';






	$html = '<div align="center"><img style="float: left;" width="100px" src="images/logo.JPG"> Доставка суши с 11.00 до 23.00: (4012) 777850 <br> г.Калининград ул. Ген. Челнокова 40.</div>';
//      $html .= 'sdfsd';
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
//      $html = iconv("windows-1251","utf-8", $html);
        $pdf->writeHTML($htm, true, false, true, false, '');
        $pdf->Output('order.pdf','I');

		
	}
	public function actionIndex()
	{
        $id = $_GET['id'];
        //$id = 5;
        $order = Order::model()->findbypk($id);
        $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf','P', 'cm', 'A4', true, 'UTF-8', false);
//      $pdf->setPageOrientation("P");
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetMargins(0,0,0, true);
        $pdf->setPrintHeader(false);
        $prefer = array(
        'PrintScaling'=>'None',
        );
        $pdf->setViewerPreferences($prefer);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
//      $pdf = iconv("windows-1251","utf-8",$pdf);
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->setFontSubsetting(false);
//        $date = date("Y-m-d H:i:s" ,strtotime($order->date_time)+(60*50));
	$htm = '<table width="80mm" style="max-width:80mm;">
	<tr>
	<td style="text-align:center;">
	<img width="50mm" src="images/logo.jpg">
	<h2>777040</h2><br>
	<h3>С 11.00 до 01.00</h3>
	ул. Фрунзе 87-89 <br>
	</td>
	</tr>
	<tr>
	<td>
	Заказ №' . $id . ' | ' . $order->date_time . '<br>
	Клиент: ' . Clients::model()->findbypk($order->tbl_client_id)->name . '<br>
	Телефон: ' . Phones::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->phone . '<br>
	Адрес: ' .
	Address::model()->findbyattributes(array('tbl_clients_id'=>$order->tbl_client_id))->address . '<br>
	Тип оплаты: Наличные <br>
	Курьер: ' . Courier::model()->findbypk($order->tbl_courier_id)->name . '<br>
	</td>
	</tr>
	</table>
	<table border="1" width="80mm" style="max-width:80mm;">
	<tr>
	<td width="100px">Наименование</td><td width="35px"> Кол-во</td><td width="55px"> Сумма</td>
	</tr>
	';
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
        $htm .= '
        <tr>
        <td> ' .
        $prod->name . '</td><td>' . $ordlis->count . ' </td><td>' . $cost . '
        </td>
        </tr>';
        }
	$htm .= '
	</table><br>
	<table width="80mm" style="max-width:80mm;">
	<tr>
	<td>
	Сумма заказа: ' . $order->cost . '<br>
	Сдача с '. $order->cash . ': ' . $minus . '<br>
	<br>
		Примечания: ' . $order->description . '<br>

	<font size="8">Департамент сервиса: 89521179784
	Вознаграждение курьера приветствуется, но остаётся на ваше усмотрение.
	</font></td>
	</tr>
	<table>
	';






	$html = '<div align="center"><img style="float: left;" width="100px" src="images/logo.JPG"> Доставка суши с 11.00 до 23.00: (4012) 777850 <br> г.Калининград ул. Ген. Челнокова 40.</div>';
//      $html .= 'sdfsd';
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
//      $html = iconv("windows-1251","utf-8", $html);
        $pdf->writeHTML($htm, true, false, true, false, '');
        $pdf->Output('order.pdf','I');

		
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
