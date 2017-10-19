<?php
/* @var $this PrepackController */
/* @var $model Prepack */
/*
$this->breadcrumbs=array(
	'Prepacks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
*/
$this->menu=array(
	array('label'=>'Список полуфабрикатов', 'url'=>array('index')),
	array('label'=>'Создать полуфабрикат', 'url'=>array('create')),
//	array('label'=>'Просмотр полуфабриката', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление полуфабрикатами', 'url'=>array('admin')),
);
?>

<h1>Изменение полуфабриката <?php echo $model->name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>