<?php
/* @var $this RevisListController */
/* @var $model RevisList */

$this->breadcrumbs=array(
	'Revis Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RevisList', 'url'=>array('index')),
	array('label'=>'Create RevisList', 'url'=>array('create')),
);

echo '<h1>Manage Revis Lists</h1>';
echo $this->renderPartial('_admin', array('model'=>$model));
?>





