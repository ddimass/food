<?php
/* @var $this PrepackPrepackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prepack Prepacks',
);

$this->menu=array(
	array('label'=>'Create PrepackPrepack', 'url'=>array('create')),
	array('label'=>'Manage PrepackPrepack', 'url'=>array('admin')),
);
?>

<h1>Prepack Prepacks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
