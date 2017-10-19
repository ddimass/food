<?php
/* @var $this PlacesController */
/* @var $model Places */

$this->breadcrumbs=array(
	'Places'=>array('index'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List Places', 'url'=>array('index')),
	array('label'=>'Добавить место хранения', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#places-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Места хранения</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'places-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'phone',
		'Address',
		'check_string',
		'desc',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
