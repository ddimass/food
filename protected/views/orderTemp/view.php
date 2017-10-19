<?php
/* @var $this OrderTempController */
/* @var $model OrderTemp */

$this->breadcrumbs=array(
	'Order Temps'=>array('index'),
	$model->random,
);

$this->menu=array(
	array('label'=>'List OrderTemp', 'url'=>array('index')),
	array('label'=>'Create OrderTemp', 'url'=>array('create')),
	array('label'=>'Update OrderTemp', 'url'=>array('update', 'id'=>$model->random)),
	array('label'=>'Delete OrderTemp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->random),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderTemp', 'url'=>array('admin')),
);
?>

<h1>View OrderTemp #<?php echo $model->random; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'random',
		'tbl_product_id',
		'count',
		'price',
		'cost',
	),
)); ?>
