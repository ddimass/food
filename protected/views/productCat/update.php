<?php
/* @var $this ProductCatController */
/* @var $model ProductCat */

$this->breadcrumbs=array(
	'Product Cats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductCat', 'url'=>array('index')),
	array('label'=>'Create ProductCat', 'url'=>array('create')),
	array('label'=>'View ProductCat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductCat', 'url'=>array('admin')),
);
?>

<h1>Update ProductCat <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>