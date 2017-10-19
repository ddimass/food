<?php
/* @var $this PrepackPrepackController */
/* @var $model PrepackPrepack */

$this->breadcrumbs=array(
	'Prepack Prepacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrepackPrepack', 'url'=>array('index')),
	array('label'=>'Create PrepackPrepack', 'url'=>array('create')),
	array('label'=>'View PrepackPrepack', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PrepackPrepack', 'url'=>array('admin')),
);
?>

<h1>Update PrepackPrepack <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>