<?php
/* @var $this KitchenController */
/* @var $model Kitchen */
/*
$this->breadcrumbs=array(
	'Kitchens'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	array('label'=>'Список кухонь', 'url'=>array('index')),
	array('label'=>'Создать кухню', 'url'=>array('create')),
//	array('label'=>'View Kitchen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление кухнями', 'url'=>array('admin')),
);
?>

<h1>Обновить кухню <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>