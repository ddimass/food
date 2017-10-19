<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>

<h1>Create OrderList</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>