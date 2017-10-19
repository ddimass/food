<?php
/* @var $this OrderIngredController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Ingreds',
);

$this->menu=array(
	array('label'=>'Create OrderIngred', 'url'=>array('create')),
	array('label'=>'Manage OrderIngred', 'url'=>array('admin')),
);
?>

<h1>Order Ingreds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
