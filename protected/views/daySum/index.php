<?php
/* @var $this DaySumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Day Sums',
);

$this->menu=array(
	array('label'=>'Create DaySum', 'url'=>array('create')),
	array('label'=>'Manage DaySum', 'url'=>array('admin')),
);
?>

<h1>Day Sums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
