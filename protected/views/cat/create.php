<?php
/* @var $this CatController */
/* @var $model Cat */
/*
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Создать категорию</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>