<?php
/* @var $this BlockedController */
/* @var $model Blocked */

$this->breadcrumbs=array(
	'Blockeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Blocked', 'url'=>array('index')),
	array('label'=>'Manage Blocked', 'url'=>array('admin')),
);
?>

<h1>Create Blocked</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>