<?php
/* @var $this PrepackController */
/* @var $model Prepack */
/*
$this->breadcrumbs=array(
	'Prepacks'=>array('index'),
	'Manage',
);
*/
$this->menu=array(
	array('label'=>'Список Полуфабрикатов', 'url'=>array('index')),
	array('label'=>'Добавить полуфабрикат', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#prepack-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление полуфабрикатами</h1>

<p>
Вы можете использовать (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого критерия поиска.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prepack-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		'description',
		'image',
		'sort',
		'cost',
		'out',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{ingred}',
			'buttons'=>array
			(
				'ingred' => array
				(
					'label' => 'Ингредиенты',
					'url' =>'Yii::app()->createUrl("prepackIngred/create",array("id"=>$data->id))',
				),
			),	
		),
	),
)); ?>
