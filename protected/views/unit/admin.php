<?php
/* @var $this UnitController */
/* @var $model Unit */
/*
$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
//	array('label'=>'List Unit', 'url'=>array('index')),
	array('label'=>'Добавить единицу измерения', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#unit-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список единиц измерения</h1>


<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>
