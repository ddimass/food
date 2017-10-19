<?php
/* @var $this MarginController */
/* @var $model Margin */

$this->breadcrumbs=array(
	'Margins'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Margin', 'url'=>array('index')),
	array('label'=>'Create Margin', 'url'=>array('create')),
	array('label'=>'View Margin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Margin', 'url'=>array('admin')),
);
?>

<h1>Update Margin <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>