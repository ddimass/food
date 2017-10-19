<?php
/* @var $this OrderListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Lists',
);

$this->menu=array(
	array('label'=>'Create OrderList', 'url'=>array('create')),
	array('label'=>'Manage OrderList', 'url'=>array('admin')),
);
?>

<h1>Order Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
