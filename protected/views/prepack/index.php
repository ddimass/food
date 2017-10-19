<?php
/* @var $this PrepackController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Prepacks',
);
*/
$this->menu=array(
	array('label'=>'Добавить полуфабрикат', 'url'=>array('create')),
	array('label'=>'Управление полуфабрикатами', 'url'=>array('admin')),
);
?>

<h1>Полуфабрикаты</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
