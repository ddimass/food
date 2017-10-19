<?php
/* @var $this IngredController */
/* @var $model Ingred */
/*
$this->breadcrumbs=array(
	'Ingreds'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
//	array('label'=>'List Ingred', 'url'=>array('index')),
	array('label'=>'Добавить ингредиент', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ingred-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список ингредиентов</h1>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ingred-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'amount',
//		'description',
//		'image',
		'cost',
		array('header'=>'Цена за ед.','value'=>'$data->amount!=0 ? $data->cost/$data->amount : 0'),
		array('name'=>'tbl_count_in_id','header'=>'Упаковка','value'=>'CountIn::model()->findbypk($data->tbl_count_in_id)->name'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
