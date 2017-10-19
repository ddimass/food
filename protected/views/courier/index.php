<?php
/* @var $this CourierController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Couriers',
);
*/
$this->menu=array(
	array('label'=>'Добавить курьера', 'url'=>array('create')),
	array('label'=>'Управление курьерами', 'url'=>array('admin')),
);
?>

<h1>Курьеры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
