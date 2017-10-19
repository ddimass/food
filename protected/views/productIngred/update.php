<?php
/* @var $this ProductIngredController */
/* @var $model ProductIngred */

$this->breadcrumbs=array(
	'Product Ingreds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductIngred', 'url'=>array('index')),
	array('label'=>'Create ProductIngred', 'url'=>array('create')),
	array('label'=>'View ProductIngred', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductIngred', 'url'=>array('admin')),
);
?>

<h1>Update ProductIngred <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>