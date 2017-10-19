<?php
/* @var $this CashController */
/* @var $model Cash */

$this->breadcrumbs=array(
	'Cashes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cash', 'url'=>array('index')),
	array('label'=>'Create Cash', 'url'=>array('create')),
	array('label'=>'Update Cash', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cash', 'url'=>array('admin')),
);
?>

<h1>View Cash #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'day',
		'hall_cost',
		'hall_count',
		'hall_p_count',
		'hall_apr_check',
		'deli_cost',
		'deli_count',
		'deli_p_count',
		'deli_apr_check',
		'day_cost',
		'day_count',
		'day_p_count',
		'day_apr_check',
		'hall_man',
		'hall_man_cost',
		'deli_man',
		'deli_man_cost',
		'desc',
	),
)); ?>
