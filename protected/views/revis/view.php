<?php
/* @var $this RevisController */
/* @var $model Revis */

$this->breadcrumbs=array(
	'Revises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Revis', 'url'=>array('index')),
	array('label'=>'Create Revis', 'url'=>array('create')),
	array('label'=>'Update Revis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Revis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Revis', 'url'=>array('admin')),
);
?>

<h1>View Revis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dt',
		'user',
		'place_id',
		'desc',
	),
)); ?>
