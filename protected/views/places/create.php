<?php
/* @var $this PlacesController */
/* @var $model Places */

$this->breadcrumbs=array(
	'Places'=>array('index'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Places', 'url'=>array('index')),
	array('label'=>'Места хранения', 'url'=>array('admin')),
);
?>

<h1>Добавить место хранения</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>