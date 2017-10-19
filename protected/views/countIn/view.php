<?php
/* @var $this CountInController */
/* @var $model CountIn */

$this->breadcrumbs=array(
	'Count Ins'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CountIn', 'url'=>array('index')),
	array('label'=>'Create CountIn', 'url'=>array('create')),
	array('label'=>'Update CountIn', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CountIn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CountIn', 'url'=>array('admin')),
);
?>

<h1>View CountIn #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'count',
		'name',
		'tbl_unit_id',
	),
)); ?>
