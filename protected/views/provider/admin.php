<?php
/* @var $this ProviderController */
/* @var $model Provider */
/*
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
//	array('label'=>'List Provider', 'url'=>array('index')),
	array('label'=>'Добавит поставщика', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#provider-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление поставщиками</h1>


<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'provider-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'phone',
		'address',
		'contact_person',
		'inn',
		'nds',
		'image',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
