<?php
/* @var $this CourierController */
/* @var $model Courier */
/*
$this->breadcrumbs=array(
	'Couriers'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список курьеров', 'url'=>array('index')),
	array('label'=>'Управление курьерами', 'url'=>array('admin')),
);
?>

<h1>Добавить курьера</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
