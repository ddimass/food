<?php
/* @var $this ProductCatController */
/* @var $model ProductCat */

$this->breadcrumbs=array(
	'Product Cats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductCat', 'url'=>array('index')),
	array('label'=>'Create ProductCat', 'url'=>array('create')),
	array('label'=>'Update ProductCat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductCat', 'url'=>array('admin')),
);
?>

<h1>View ProductCat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sort',
		'tbl_product_id',
		'tbl_cat_id',
	),
)); ?>
