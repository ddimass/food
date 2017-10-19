<?php
/* @var $this IngredInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingred Invoices',
);

$this->menu=array(
	array('label'=>'Create IngredInvoice', 'url'=>array('create')),
	array('label'=>'Manage IngredInvoice', 'url'=>array('admin')),
);
?>

<h1>Ingred Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
