<?php
/* @var $this CatController */
/* @var $model Cat */
/**
$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	array('label'=>'Список категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
//	array('label'=>'Просмотреть категорию', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление категориями', 'url'=>array('admin')),
);
?>

<h1>Обновить категорию <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>