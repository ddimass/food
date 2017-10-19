<?php
/* @var $this DaySumController */
/* @var $model DaySum */

$this->breadcrumbs=array(
	'Day Sums'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DaySum', 'url'=>array('index')),
	array('label'=>'Create DaySum', 'url'=>array('create')),
	array('label'=>'Update DaySum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DaySum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DaySum', 'url'=>array('admin')),
);
?>

<h1>View DaySum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dt',
		'count_in',
		'cost_in',
		'count_out',
		'cost_out',
	),
)); ?>
