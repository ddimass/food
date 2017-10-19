<?php
/* @var $this KitchenController */
/* @var $model Kitchen */
/*
$this->breadcrumbs=array(
	'Kitchens'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'Список кухонь', 'url'=>array('index')),
	array('label'=>'Новая кухня', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kitchen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Управление кухнями</h1>

<p>
Вы можете использовать (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале критерия поиска.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kitchen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'description',
		'image',
		'sort',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
