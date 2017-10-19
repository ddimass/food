<?php
/* @var $this CourierController */
/* @var $model Courier */
/*
$this->breadcrumbs=array(
	'Couriers'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	array('label'=>'Список курьеров', 'url'=>array('index')),
	array('label'=>'Добавить курьера', 'url'=>array('create')),
	array('label'=>'Отобразить курьера', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление курьерами', 'url'=>array('admin')),
);
?>

<h1>Обновить курьера <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>