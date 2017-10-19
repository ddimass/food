<?php
/* @var $this BlockedController */
/* @var $model Blocked */

$this->breadcrumbs=array(
	'Blockeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blocked', 'url'=>array('index')),
	array('label'=>'Create Blocked', 'url'=>array('create')),
	array('label'=>'View Blocked', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Blocked', 'url'=>array('admin')),
);
?>

<h1>Update Blocked <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>