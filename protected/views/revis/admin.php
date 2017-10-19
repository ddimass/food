<?php
/* @var $this RevisController */
/* @var $model Revis */

$this->breadcrumbs=array(
	'Revises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Revis', 'url'=>array('index')),
	array('label'=>'Create Revis', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#revis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Revises</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revis-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dt',
		array('name'=>'user','value'=>'User::model()->findbypk($data->user)->name'),
		'place_id',
		'desc',
	array(
		'class'=>'CButtonColumn',
		'htmlOptions'=>array('width'=>'64px'),
		'template'=>'{updater}',
		'buttons'=> array (
		'updater'=>array
			(
		'label'=>'Изменить',
		'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/edit.png',
		'url'=>'Yii::app()->createUrl("RevisList/admin",array("id"=>$data->id))',
		    ),
		))),
)); ?>
