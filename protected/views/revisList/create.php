<?php
/* @var $this RevisListController */
/* @var $model RevisList */

$this->breadcrumbs=array(
	'Revis Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RevisList', 'url'=>array('index')),
	array('label'=>'Manage RevisList', 'url'=>array('admin')),
);
?>

<h1>Create RevisList</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>