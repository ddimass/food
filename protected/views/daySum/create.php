<?php
/* @var $this DaySumController */
/* @var $model DaySum */

$this->breadcrumbs=array(
	'Day Sums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DaySum', 'url'=>array('index')),
	array('label'=>'Manage DaySum', 'url'=>array('admin')),
);
?>

<h1>Create DaySum</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>