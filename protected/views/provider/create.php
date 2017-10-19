<?php
/* @var $this ProviderController */
/* @var $model Provider */
/*
$this->breadcrumbs=array(
	'Providers'=>array('index'),
	'Create',
);
*/
$this->menu=array(
//	array('label'=>'List Provider', 'url'=>array('index')),
	array('label'=>'Список поставщиков', 'url'=>array('admin')),
);
?>

<h1>Добавить поставщика</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>