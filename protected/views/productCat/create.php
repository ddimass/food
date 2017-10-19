<?php
/* @var $this ProductCatController */
/* @var $model ProductCat */

$this->breadcrumbs=array(
	'Product Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductCat', 'url'=>array('index')),
	array('label'=>'Manage ProductCat', 'url'=>array('admin')),
);
?>

<h1>Create ProductCat</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>