<?php
/* @var $this ProductIngredController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Ingreds',
);

$this->menu=array(
	array('label'=>'Create ProductIngred', 'url'=>array('create')),
	array('label'=>'Manage ProductIngred', 'url'=>array('admin')),
);
?>

<h1>Product Ingreds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
