<?php
/* @var $this OrderIngredController */
/* @var $model OrderIngred */
/*
$this->breadcrumbs=array(
	'Order Ingreds'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'List OrderIngred', 'url'=>array('index')),
	array('label'=>'Create OrderIngred', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-ingred-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Списание ингредиентов</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-ingred-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'tbl_order_id',
		array('name'=>'tbl_order_id','value'=>'Order::model()->findbypk($data->tbl_order_id)->date_time'),
		array('name'=>'tbl_product_id','value'=>'Product::model()->findbypk($data->tbl_product_id)->name'),
		array('name'=>'tbl_ingred_id','value'=>'Ingred::model()->findbypk($data->tbl_ingred_id)->name'),
		array('name'=>'count','value'=>'$data->count*1000'),
		'held',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
