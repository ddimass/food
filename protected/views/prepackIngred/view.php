<?php
/* @var $this ProductIngredController */
/* @var $model ProductIngred */

$this->breadcrumbs=array(
	'Product Ingreds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductIngred', 'url'=>array('index')),
	array('label'=>'Create ProductIngred', 'url'=>array('create')),
	array('label'=>'Update ProductIngred', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductIngred', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductIngred', 'url'=>array('admin')),
);
?>

<h1>View ProductIngred #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_product_id',
		'count',
		'tbl_ingred_id',
	),
)); ?>
