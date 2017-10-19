<?php
/* @var $this CatController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Cats',
);
*/
$this->menu=array(
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Категории</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));  ?>

