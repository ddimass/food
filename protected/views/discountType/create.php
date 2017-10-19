<?php
/* @var $this DiscountTypeController */
/* @var $model DiscountType */

$this->breadcrumbs=array(
	'Discount Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DiscountType', 'url'=>array('index')),
	array('label'=>'Manage DiscountType', 'url'=>array('admin')),
);
?>

<h1>Create DiscountType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>