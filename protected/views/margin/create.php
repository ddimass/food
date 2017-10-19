<?php
/* @var $this MarginController */
/* @var $model Margin */

$this->breadcrumbs=array(
	'Margins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Margin', 'url'=>array('index')),
	array('label'=>'Manage Margin', 'url'=>array('admin')),
);
?>

<h1>Create Margin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>