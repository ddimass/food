<?php
/* @var $this CashController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cashes',
);

$this->menu=array(
	array('label'=>'Create Cash', 'url'=>array('create')),
	array('label'=>'Manage Cash', 'url'=>array('admin')),
);
?>

<h1>Cashes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
