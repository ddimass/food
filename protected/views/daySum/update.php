<?php
/* @var $this DaySumController */
/* @var $model DaySum */

$this->breadcrumbs=array(
	'Day Sums'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DaySum', 'url'=>array('index')),
	array('label'=>'Create DaySum', 'url'=>array('create')),
	array('label'=>'View DaySum', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DaySum', 'url'=>array('admin')),
);
?>

<h1>Update DaySum <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>