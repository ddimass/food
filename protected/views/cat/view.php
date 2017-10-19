<?php
/* @var $this CatController */
/* @var $model Cat */
/*
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->name,
);
*/
$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Обновить категорию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить категорию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>View Cat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'image',
		'sort',
		'enabled',
	),
)); ?>
