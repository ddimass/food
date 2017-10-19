<?php
/* @var $this UsersReportController */
/* @var $model UsersReport */

$this->breadcrumbs=array(
	'Users Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersReport', 'url'=>array('index')),
	array('label'=>'Manage UsersReport', 'url'=>array('admin')),
);
?>

<h1>Create UsersReport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>