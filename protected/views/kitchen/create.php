<?php
/* @var $this KitchenController */
/* @var $model Kitchen */
/*
$this->breadcrumbs=array(
	'Kitchens'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список кухонь', 'url'=>array('index')),
	array('label'=>'Управление кухнями', 'url'=>array('admin')),
);
?>

<h1>Новая кухня</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>