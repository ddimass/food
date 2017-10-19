<?php
/* @var $this ClaimController */
/* @var $model Claim */

$this->breadcrumbs=array(
	'Claims'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Claim', 'url'=>array('index')),
	array('label'=>'Create Claim', 'url'=>array('create')),
	array('label'=>'View Claim', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Claim', 'url'=>array('admin')),
);
?>

<h1>Update Claim <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>