<?php
/* @var $this IngredController */
/* @var $model Ingred */

$this->breadcrumbs=array(
	'Ingreds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Ingred', 'url'=>array('index')),
	array('label'=>'Create Ingred', 'url'=>array('create')),
	array('label'=>'Update Ingred', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingred', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingred', 'url'=>array('admin')),
);
?>

<h1>View Ingred #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'amount',
		'description',
		'image',
		'cost',
		'tbl_count_in_id',
	),
)); ?>
