<?php
/* @var $this CountInController */
/* @var $model CountIn */
/*
$this->breadcrumbs=array(
	'Count Ins'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
//	array('label'=>'List CountIn', 'url'=>array('index')),
	array('label'=>'Добавить стандартную поставку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#count-in-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список стандартных поставок</h1>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'count-in-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'count',
		'name',
		array('name'=>'tbl_unit_id','header'=>'Единица измерения','value'=>'Unit::model()->findbypk($data->tbl_unit_id)->name'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
		),
	),
)); ?>
