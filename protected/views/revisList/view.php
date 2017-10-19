<?php
/* @var $this RevisListController */
/* @var $model RevisList */

$this->breadcrumbs=array(
	'Revis Lists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RevisList', 'url'=>array('index')),
	array('label'=>'Create RevisList', 'url'=>array('create')),
	array('label'=>'Update RevisList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RevisList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RevisList', 'url'=>array('admin')),
);
?>

<h1>View RevisList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_ingred_id',
		'count',
		'cost',
		'count_in',
		'margin',
		'desc',
	),
)); ?>
