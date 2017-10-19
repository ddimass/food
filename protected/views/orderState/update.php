<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Create OrderState', 'url'=>array('create')),
	array('label'=>'View OrderState', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>Update OrderState <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>