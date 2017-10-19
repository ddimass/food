<?php
/* @var $this IngredController */
/* @var $model Ingred */
/*
$this->breadcrumbs=array(
	'Ingreds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
//	array('label'=>'List Ingred', 'url'=>array('index')),
	array('label'=>'Добавить ингредиент', 'url'=>array('create')),
//	array('label'=>'View Ingred', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Список ингредиентов', 'url'=>array('admin')),
);
?>

<h1>Обновить ингредиент <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>