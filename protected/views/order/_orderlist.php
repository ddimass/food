<?php
/* @var $this OrderTempController */
/* @var $model OrderTemp */
/*
$this->breadcrumbs=array(
	'Order Temps'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OrderTemp', 'url'=>array('index')),
	array('label'=>'Create OrderTemp', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-temp-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-list-temp-grid',
	'ajaxUpdate' => true,
	'dataProvider'=>$orderlist->search(),
//	'rowCssClassExpression'=>'$data->tbl_state_id==2?"red":"green"',
//	'filter'=>$orderlist,
	'columns'=>array(
//		'random',
//		array(
//		'name'=>'[+]',
//		'type'=>'raw',
//		'value'=>'CHtml::ajaxlink("plus", CController::createurl("order/plus"), array("update"=>"#order-calc"))',
//		'value'=>'CHtml::ajaxlink("del",CController::createurl("order/delete1&id=".$data->tbl_product_id), array("update"=>"#order-calc"), array("id"=>"listde"))',
//		),
		array(
		'class'=>'CButtonColumn',
		'htmlOptions'=>array('width'=>'100px'),
		'template'=>'{plus}{minus}{del}',
		'buttons'=> array(
			'del' => array(
				'label'=>'del',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/del.png',
				'url'=>'Yii::app()->createUrl("order/delete1",array("id"=>$data->random))',
//				'options'=> array('id'=>'del','ajax'=>array('type'=>'get','url'=>'Yii::app()->createUrl("order/delete1",array("id"=>$data->random))', 'update'=>'#order-calc')),
				'options'=> array('id'=>'del','ajax'=>array('type'=>'get','url'=>'js:$(this).attr("href")', 'update'=>'#order-calc')),
			),
			'minus' => array(
				'label'=>'[-]',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/minus.png',
				'url'=>'Yii::app()->createUrl("order/minus",array("id"=>$data->random))',
				'options'=> array('id'=>'minus','ajax'=>array('type'=>'get','url'=>'js:$(this).attr("href")', 'update'=>'#order-calc')),
			),
			'plus' => array(
				'label'=>'[+]',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/plus.png',
				'url'=>'Yii::app()->createUrl("order/plus",array("id"=>$data->random))',
				'options'=> array('id'=>'plus','ajax'=>array('type'=>'get','url'=>'js:$(this).attr("href")', 'update'=>'#order-calc')),
			),
		),
		),
		array(
		'name'=>'tbl_product_id',
		'value'=>'Product::model()->findbypk($data->tbl_product_id)->name',
		'footer'=>'<h3>Итого (с учётом скидки)</h3>',
		),
		array(
		'name'=>'count',
		'htmlOptions'=>array('width'=>'50px'),
		),
		array(
		'name'=>'price',
		'htmlOptions'=>array('width'=>'50px'),
		),
		array(
		'name'=>'cost',
		'htmlOptions'=>array('width'=>'50px'),
		'footer'=>'<h3>'. number_format(Order::calc(),2).'</h3>',
		),
	),
)); 
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/css/my.js');
?>
