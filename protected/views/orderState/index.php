<?php
/* @var $this OrderStateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order States',
);

$this->menu=array(
	array('label'=>'Create OrderState', 'url'=>array('create')),
	array('label'=>'Manage OrderState', 'url'=>array('admin')),
);
?>

<h1>Order States</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
