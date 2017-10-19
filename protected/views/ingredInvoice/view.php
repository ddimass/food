<?php
/* @var $this IngredInvoiceController */
/* @var $model IngredInvoice */

$this->breadcrumbs=array(
	'Ingred Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IngredInvoice', 'url'=>array('index')),
	array('label'=>'Create IngredInvoice', 'url'=>array('create')),
	array('label'=>'Update IngredInvoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IngredInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IngredInvoice', 'url'=>array('admin')),
);
?>

<h1>View IngredInvoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tbl_ingred_id',
		'tbl_invoice_id',
		'id',
		'count',
		'cost',
	),
)); ?>
