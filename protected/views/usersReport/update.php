<?php
/* @var $this UsersReportController */
/* @var $model UsersReport */

$this->breadcrumbs=array(
	'Users Reports'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersReport', 'url'=>array('index')),
	array('label'=>'Create UsersReport', 'url'=>array('create')),
	array('label'=>'View UsersReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersReport', 'url'=>array('admin')),
);
?>

<h1>Update UsersReport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>