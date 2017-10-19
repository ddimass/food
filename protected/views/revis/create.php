<?php
/* @var $this RevisController */
/* @var $model Revis */

$this->breadcrumbs=array(
	'Revises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Revis', 'url'=>array('index')),
	array('label'=>'Manage Revis', 'url'=>array('admin')),
);
?>

<h1>Create Revis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>