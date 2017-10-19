<?php
/* @var $this OrderTempController */
/* @var $model OrderTemp */

$this->breadcrumbs=array(
	'Order Temps'=>array('index'),
	$model->random=>array('view','id'=>$model->random),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderTemp', 'url'=>array('index')),
	array('label'=>'Create OrderTemp', 'url'=>array('create')),
	array('label'=>'View OrderTemp', 'url'=>array('view', 'id'=>$model->random)),
	array('label'=>'Manage OrderTemp', 'url'=>array('admin')),
);
?>

<h1>Update OrderTemp <?php echo $model->random; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>