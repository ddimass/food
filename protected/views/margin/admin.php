<?php
/* @var $this MarginController */
/* @var $model Margin */

$this->breadcrumbs=array(
	'Margins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Margin', 'url'=>array('index')),
	array('label'=>'Create Margin', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#margin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/?>

<h1>Анализ себестоимости</h1>



<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'margin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
//		'dt',
		array('name'=>'name','footer'=>'Итого'),
		array('name'=>'count','footer'=>$model->pageTotal($model->search(), 'count')),
		'cost',
		array('name'=>'cost_count','footer'=>$model->pageTotal($model->search(), 'cost_count'),'htmlOptions'=>array('style'=>'background-color:#b0c4de;')),
//		'cost_count',
		'own_cost',
//		'own_cost_count',
		array('name'=>'own_cost_count','footer'=>$model->pageTotal($model->search(), 'own_cost_count'),'htmlOptions'=>array('style'=>'background-color:#b0c4de;')),
		array('name'=>'margin_cost','footer'=>$model->pageTotal($model->search(), 'margin_cost'),'htmlOptions'=>array('style'=>'background-color:#b0c4de;')),
//		'margin_cost',
		'margin',
		'own_margin',
		'cat',
		'kitchen',
//		'hall_deli',
//		'desc',
/*		array(
			'class'=>'CButtonColumn',
		), */
	),
)); ?>
<a href=margin.csv> Скачать анализ себестоимости</a>
