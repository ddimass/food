<?php
/* @var $this MarginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Margins',
);

$this->menu=array(
	array('label'=>'Create Margin', 'url'=>array('create')),
	array('label'=>'Manage Margin', 'url'=>array('admin')),
);
?>

<h1>Margins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
