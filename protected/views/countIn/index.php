<?php
/* @var $this CountInController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Count Ins',
);

$this->menu=array(
	array('label'=>'Create CountIn', 'url'=>array('create')),
	array('label'=>'Manage CountIn', 'url'=>array('admin')),
);
?>

<h1>Count Ins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
