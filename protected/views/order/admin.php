<?php
/* @var $this OrderController */
/* @var $model Order */
/*
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
);
?>

<script>
 window.setInterval("$.fn.yiiGridView.update('order-grid')",10000);
</script>

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Заказы</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
//$states = State::model()->findall();
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'rowCssClassExpression'=>'Order::rowcolor($data->tbl_state_id)',
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'date_time',
		array('header'=>'Изменён', 'value'=>'count(OrderState::getlast($data->id)) ? OrderState::getlast($data->id)->date_time : "--" ',),
		array('name'=>'tbl_user_id','value'=>'User::model()->findbypk($data->tbl_user_id)->name',),
		array('name'=>'tbl_client_id','value'=>'Phones::model()->findbyattributes(array("tbl_clients_id"=>$data->tbl_client_id))->phone',),
		array('header'=>'Адрес','value'=>'Address::model()->findbyattributes(array("tbl_clients_id"=>$data->tbl_client_id))->address',),
//		array('name'=>'tbl_client_id','value'=>'$data->tblClient->tblPho',),
//		array('name'=>'tbl_state_id','value'=>'State::model()->findbypk($data->tbl_state_id)->name',),
		array('name'=>'tbl_state_id','value'=>'$data->getStatus($data->id,$data->tbl_state_id)','type'=>'raw',),
		array('name'=>'description','value'=>'$data->description', 'htmlOptions'=>array('width'=>'40px'),),
		'cost',
//		array('name'=>'tbl_courier_id','value'=>'Courier::model()->findbypk($data->tbl_courier_id)->name'),
		array('name'=>'tbl_courier_id','value'=>'$data->getCourier($data->id,$data->tbl_courier_id)','type'=>'raw'),

		array('name'=>'tbl_discount_type_id','value'=>'DiscountType::model()->findbypk($data->tbl_discount_type_id)->type'),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'64px'),
			'template'=>'{update}{print}',
			'buttons'=> array(
				'print'=> array
				(
					'label'=>'Print',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/print.png',
					'options'=>array("target"=>"_blank"),
					'url'=>'Yii::app()->createUrl("CheckPrint/index",array("id"=>$data->id))',
				),
				'update'=>array
				(
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/edit.png',
				),
			),
		),
	),
)); ?>
