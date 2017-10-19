<?php
/* @var $this KitchenController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Kitchens',
);
*/
$this->menu=array(
	array('label'=>'Добавить кухню', 'url'=>array('create')),
	array('label'=>'Управление кухнями', 'url'=>array('admin')),
);
?>

<h1>Кухни</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
