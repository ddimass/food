<?php
/* @var $this BlockedController */
/* @var $model Blocked */

$this->breadcrumbs=array(
	'Blockeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Blocked', 'url'=>array('index')),
	array('label'=>'Create Blocked', 'url'=>array('create')),
	array('label'=>'Update Blocked', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Blocked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Blocked', 'url'=>array('admin')),
);
?>

<h1>View Blocked #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'date',
		'tbl_user_id',
		'tbl_clients_id',
	),
)); ?>
