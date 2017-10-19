<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/*
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
//	array('label'=>'List Invoice', 'url'=>array('index')),
	array('label'=>'Добавить накладную', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#invoice-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление накладными</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>
	$model->search(),
//		'pagination' => array('pagesize'=> '50'),
//		),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'date',
		'number',
		array('name'=>'tbl_provider_id','header'=>'Поставщик','value'=>'Provider::model()->findbypk($data->tbl_provider_id)->name'),
		array('name'=>'id','header'=>'Сумма','value'=>'Invoice::calccost($data->id)'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}{update}',
		),
	),
)); ?>
