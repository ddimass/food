<?php
/* @var $this RevisListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Revis Lists',
);

$this->menu=array(
	array('label'=>'Create RevisList', 'url'=>array('create')),
	array('label'=>'Manage RevisList', 'url'=>array('admin')),
);
?>

<h1>Revis Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
