<?php
/* @var $this CountInController */
/* @var $model CountIn */
/*
$this->breadcrumbs=array(
	'Count Ins'=>array('index'),
	'Create',
);
*/
$this->menu=array(
//	array('label'=>'List CountIn', 'url'=>array('index')),
	array('label'=>'Список стандартных поставок', 'url'=>array('admin')),
);
?>

<h1>Добавить стандартную поставку</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>