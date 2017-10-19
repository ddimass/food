<?php
/* @var $this PrepackController */
/* @var $model Prepack */
/*
$this->breadcrumbs=array(
	'Prepacks'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список полуфабрикатов', 'url'=>array('index')),
	array('label'=>'Управление полуфабрикатами', 'url'=>array('admin')),
);
?>

<h1>Создать полуфабрикат</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
