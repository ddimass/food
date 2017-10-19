<?php
/* @var $this CashController */
/* @var $model Cash */

$this->breadcrumbs=array(
	'Cashes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cash', 'url'=>array('index')),
	array('label'=>'Create Cash', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cash-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Анализ выручки по дням</h1>


<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cash-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'dt',
		'day',
		'hall_cost',
		'hall_count',
		'hall_p_count',
		'hall_apr_check',
		'deli_cost',
		'deli_count',
		'deli_p_count',
		'deli_apr_check',
		array('name'=>'day_cost',
		'value'=>'$data->day_cost',
		'footer'=>$model->pageTotal($model->search()),
		),
		'day_count',
		'day_p_count',
		'day_apr_check',
		'hall_man',
		'hall_man_cost',
		'deli_man',
		'deli_man_cost',
//		'desc',
		
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
