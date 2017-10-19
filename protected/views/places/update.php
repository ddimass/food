<?php
/* @var $this PlacesController */
/* @var $model Places */

$this->breadcrumbs=array(
	'Places'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Places', 'url'=>array('index')),
	array('label'=>'Добавить место хранения', 'url'=>array('create')),
//	array('label'=>'View Places', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Места хранения', 'url'=>array('admin')),
);
?>

<h1>Изменить место хранения <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>