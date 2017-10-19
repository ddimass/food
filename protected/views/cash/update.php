<?php
/* @var $this CashController */
/* @var $model Cash */

$this->breadcrumbs=array(
	'Cashes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cash', 'url'=>array('index')),
	array('label'=>'Create Cash', 'url'=>array('create')),
	array('label'=>'View Cash', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cash', 'url'=>array('admin')),
);
?>

<h1>Update Cash <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>