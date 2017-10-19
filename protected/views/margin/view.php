<?php
/* @var $this MarginController */
/* @var $model Margin */

$this->breadcrumbs=array(
	'Margins'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Margin', 'url'=>array('index')),
	array('label'=>'Create Margin', 'url'=>array('create')),
	array('label'=>'Update Margin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Margin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Margin', 'url'=>array('admin')),
);
?>

<h1>View Margin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dt',
		'name',
		'count',
		'cost',
		'cost_count',
		'own_cost',
		'own_cost_count',
		'margin',
		'own_margin',
		'desc',
	),
)); ?>
