<?php
/* @var $this CountInController */
/* @var $model CountIn */

$this->breadcrumbs=array(
	'Count Ins'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CountIn', 'url'=>array('index')),
	array('label'=>'Create CountIn', 'url'=>array('create')),
	array('label'=>'View CountIn', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CountIn', 'url'=>array('admin')),
);
?>

<h1>Update CountIn <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>