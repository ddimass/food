<?php
/* @var $this OrderStateController */
/* @var $model OrderState */

$this->breadcrumbs=array(
	'Order States'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OrderState', 'url'=>array('index')),
	array('label'=>'Create OrderState', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-state-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Order States</h1>

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
	'id'=>'order-state-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tbl_order_id',
		'tbl_state_id',
		'user_id',
		'date_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
