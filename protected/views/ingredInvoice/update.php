<?php
/* @var $this IngredInvoiceController */
/* @var $model IngredInvoice */

$this->breadcrumbs=array(
	'Ingred Invoices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IngredInvoice', 'url'=>array('index')),
	array('label'=>'Create IngredInvoice', 'url'=>array('create')),
	array('label'=>'View IngredInvoice', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IngredInvoice', 'url'=>array('admin')),
);
?>

<h1>Update IngredInvoice <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>