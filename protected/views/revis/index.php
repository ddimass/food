<?php
/* @var $this RevisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Revises',
);

$this->menu=array(
	array('label'=>'Create Revis', 'url'=>array('create')),
	array('label'=>'Manage Revis', 'url'=>array('admin')),
);
?>

<h1>Revises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
