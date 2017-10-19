<?php

class TestController extends Controller
{
	public function actionIndex()
	{
	// $name = 'product/';
	// $prs = Product::model()->findall();
	/* foreach ($prs as $pr) {
	if (trim($pr->image)!='') {
	$img = '/images/' . $name . $pr->image;
	$image = new EasyImage($img);
	$image->resize(100);
	$imgo = '/var/www/Sofit_Food/expr/tmb_images/' . $name . $pr->image;
	$image->save($imgo);
	}
	}
	*/
	//$session = Yii::app()->session;
//	$pf = Ingred::model()->findbyattributes(array('name'=>'7 АП (банка)'));
//	$pf->amount = 0;
//	$pf->save();
//	$ings = IngredInvoice::model()->findbyattributes(array('tbl_ingred_id'=>$pf->id));
//	$inv = Invoice::model()->findbypk(63);
	//	$ings = Product::model()->findbypk(99);
	//$ings = Product::ingcalc(1);
//	$inv = Yii::app()->session;
//	$inv['pos'] = 
//	$orderls = OrderList::model()->findall();
//	OrderIngred::model()->deleteall();
//	foreach($orderls as $orderl) {
//	$arr = Product::ingcal($orderl->tbl_product_id,$orderl->count);
//	OrderIngred::sav($arr,$orderl->tbl_order_id,$orderl->tbl_product_id);
//	$sales = Order::calc();
//	$inv = Yii::app()->session;
//	}
//	$inv['post'] = $arr;
	//$inv = Product::ingcalc(85);
	//$orders = Order::model()->findall();
//	$current = strtotime('2014-05-01');
//	$last = strtotime('2014-06-02');
//	while ($current <= $last) {
//	echo date('Y-m-d',$current);
//	$crit = new CDBcriteria;
//	$crit->addBeetwenCondition();
//	$current = strtotime('+1 day', $current);
	
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