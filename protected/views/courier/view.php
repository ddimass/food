<?php
/* @var $this CourierController */
/* @var $model Courier */
/*
$this->breadcrumbs=array(
	'Couriers'=>array('index'),
	$model->name,
);
*/
$this->menu=array(
	array('label'=>'Список курьеров', 'url'=>array('index')),
	array('label'=>'Добавить курьера', 'url'=>array('create')),
	array('label'=>'Обновить курьера', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Courier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление курьера', 'url'=>array('admin')),
);
?>

<h1>Курьер <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phone',
	),
)); ?>
