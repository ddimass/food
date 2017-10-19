<?php
/* @var $this OrderController */
/* @var $model Order */
/*
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model,'prodcats'=>$prodcats, 'phlists'=>$phlists, 'orderlist'=>$orderlist)); ?>