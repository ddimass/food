<?php
/* @var $this ProductController */
/* @var $model Product */
/*
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id,
);
*/
$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Добавить продукт', 'url'=>array('create')),
	array('label'=>'Обновить продукт', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить продукт', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Продукт "<?php echo $model->name; ?> "</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'name',
		'price',
		'own_price',
		'description',
		'Kitchen',
		'image',
		'sort',
		'enabled',
	),
)); ?>
