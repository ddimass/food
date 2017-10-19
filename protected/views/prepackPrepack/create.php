<?php
/* @var $this PrepackPrepackController */
/* @var $model PrepackPrepack */

$this->breadcrumbs=array(
	'Prepack Prepacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrepackPrepack', 'url'=>array('index')),
	array('label'=>'Manage PrepackPrepack', 'url'=>array('admin')),
);
?>

<h1>Create PrepackPrepack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>