<?php
/* @var $this ProductController */
/* @var $model Product 

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);
*/
$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Управление продукта', 'url'=>array('admin')),
);
?>

<h1>Новый продукт</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'pcmodel'=>$pcmodel)); ?>