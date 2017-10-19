<?php
/* @var $this KitchenController */
/* @var $model Kitchen */

$this->breadcrumbs=array(
	'Kitchens'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список кухонь', 'url'=>array('index')),
	array('label'=>'Создать кухню', 'url'=>array('create')),
	array('label'=>'Обновить кухню', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Kitchen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление кухнями', 'url'=>array('admin')),
);
?>

<h1>Кухня "<?php echo $model->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image',
		'description',
		'sort',
	),
)); ?>
