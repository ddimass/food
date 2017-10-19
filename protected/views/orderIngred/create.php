<?php
/* @var $this OrderIngredController */
/* @var $model OrderIngred */

$this->breadcrumbs=array(
	'Order Ingreds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderIngred', 'url'=>array('index')),
	array('label'=>'Manage OrderIngred', 'url'=>array('admin')),
);
?>

<h1>Create OrderIngred</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>