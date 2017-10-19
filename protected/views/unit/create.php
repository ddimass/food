<?php
/* @var $this UnitController */
/* @var $model Unit */
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Create',
);
*/
$this->menu=array(
//	array('label'=>'List Unit', 'url'=>array('index')),
	array('label'=>'Список единц измерения', 'url'=>array('admin')),
);
?>

<h1>Добавить единицу измерения</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>