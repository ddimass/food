<?php
/* @var $this PrepackPrepackController */
/* @var $model PrepackPrepack */

$this->breadcrumbs=array(
	'Prepack Prepacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PrepackPrepack', 'url'=>array('index')),
	array('label'=>'Create PrepackPrepack', 'url'=>array('create')),
	array('label'=>'Update PrepackPrepack', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PrepackPrepack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrepackPrepack', 'url'=>array('admin')),
);
?>

<h1>View PrepackPrepack #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_prepack_id',
		'prepack_id',
		'count',
	),
)); ?>
