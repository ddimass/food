<?php
/* @var $this BlockedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Blockeds',
);

$this->menu=array(
	array('label'=>'Create Blocked', 'url'=>array('create')),
	array('label'=>'Manage Blocked', 'url'=>array('admin')),
);
?>

<h1>Blockeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
