<?php
/* @var $this OrderIngredController */
/* @var $model OrderIngred */

$this->breadcrumbs=array(
	'Order Ingreds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderIngred', 'url'=>array('index')),
	array('label'=>'Create OrderIngred', 'url'=>array('create')),
	array('label'=>'Update OrderIngred', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderIngred', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderIngred', 'url'=>array('admin')),
);
?>

<h1>View OrderIngred #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_order_id',
		'tbl_product_id',
		'tbl_ingred_id',
		'count',
		'held',
	),
)); ?>
