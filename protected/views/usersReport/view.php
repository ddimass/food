<?php
/* @var $this UsersReportController */
/* @var $model UsersReport */

$this->breadcrumbs=array(
	'Users Reports'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UsersReport', 'url'=>array('index')),
	array('label'=>'Create UsersReport', 'url'=>array('create')),
	array('label'=>'Update UsersReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersReport', 'url'=>array('admin')),
);
?>

<h1>View UsersReport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phone',
		'Address',
		'order_count',
		'apr_order_count',
		'desc',
	),
)); ?>
