<?php
/* @var $this RevisListController */
/* @var $model RevisList */

$this->breadcrumbs=array(
	'Revis Lists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RevisList', 'url'=>array('index')),
	array('label'=>'Create RevisList', 'url'=>array('create')),
	array('label'=>'View RevisList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RevisList', 'url'=>array('admin')),
);
?>

<h1>Update RevisList <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>