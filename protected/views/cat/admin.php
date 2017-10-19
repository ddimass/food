<?php
/* @var $this CatController */
/* @var $model Cat */
/*
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
?>

<h1>Управление категориями</h1>

<p>
Вы можете использовать (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого критерия поиска.
</p>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); */ ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'image',
		'sort',
		'enabled',
		array(
			'header'=>'Действия',
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
