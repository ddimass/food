<?php
/* @var $this IngredController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingreds',
);

$this->menu=array(
	array('label'=>'Create Ingred', 'url'=>array('create')),
	array('label'=>'Manage Ingred', 'url'=>array('admin')),
);
?>

<h1>Ingreds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
