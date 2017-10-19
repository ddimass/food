<?php
/* @var $this IngredController */
/* @var $model Ingred */
/*
$this->breadcrumbs=array(
	'Ingreds'=>array('index'),
	'Create',
);
*/
$this->menu=array(
//	array('label'=>'List Ingred', 'url'=>array('index')),
	array('label'=>'Список ингредиентов', 'url'=>array('admin')),
);
?>

<h1>Добавить ингредиент</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>