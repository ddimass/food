<?php
/* @var $this OrderIngredController */
/* @var $model OrderIngred */

$this->breadcrumbs=array(
	'Order Ingreds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderIngred', 'url'=>array('index')),
	array('label'=>'Create OrderIngred', 'url'=>array('create')),
	array('label'=>'View OrderIngred', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderIngred', 'url'=>array('admin')),
);
?>

<h1>Update OrderIngred <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>