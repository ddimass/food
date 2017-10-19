<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>Create OrderState</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>