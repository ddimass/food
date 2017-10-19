<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Create OrderState', 'url'=>array('create')),
	array('label'=>'Update OrderState', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>View OrderState #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_order_id',
		'tbl_state_id',
		'user_id',
		'date_time',
	),
)); ?>
