<?php
/* @var $this RevisController */
/* @var $model Revis */

$this->breadcrumbs=array(
	'Revises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Revis', 'url'=>array('index')),
	array('label'=>'Create Revis', 'url'=>array('create')),
	array('label'=>'View Revis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Revis', 'url'=>array('admin')),
);
?>

<h1>Update Revis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>