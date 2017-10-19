<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/*
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список накладных', 'url'=>array('index')),
	array('label'=>'Управление накладными', 'url'=>array('admin')),
);
?>

<h1>Добавить накладную</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>