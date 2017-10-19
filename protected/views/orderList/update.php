<?php
/* @var $this OrderListController */
/* @var $model OrderList */

$this->breadcrumbs=array(
	'Order Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderList', 'url'=>array('index')),
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'View OrderList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>

<h1>Update OrderList <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>