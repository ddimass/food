<?php
/* @var $this PrepackController */
/* @var $model Prepack */
/*
$this->breadcrumbs=array(
	'Prepacks'=>array('index'),
	$model->name,
);
*/
$this->menu=array(
	array('label'=>'Список полуфабрикатов', 'url'=>array('index')),
	array('label'=>'Создать полуфабрикат', 'url'=>array('create')),
	array('label'=>'Обновить полуфабрикат', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Prepack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление полуфабрикатами', 'url'=>array('admin')),
);
?>

<h1>Просмотр полуфабриката #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'name',
		'description',
		'image',
		'sort',
		'out',
	),
)); ?>
