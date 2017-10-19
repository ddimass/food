<?php
/* @var $this IngredInvoiceController */
/* @var $model IngredInvoice */

$this->breadcrumbs=array(
	'Ingred Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IngredInvoice', 'url'=>array('index')),
	array('label'=>'Manage IngredInvoice', 'url'=>array('admin')),
);
?>

<h1>Create IngredInvoice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>