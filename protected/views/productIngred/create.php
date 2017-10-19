<?php
/* @var $this ProductIngredController */
/* @var $model ProductIngred */
/*
$this->breadcrumbs=array(
	'Product Ingreds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductIngred', 'url'=>array('index')),
	array('label'=>'Manage ProductIngred', 'url'=>array('admin')),
);
*/
?>

<h1>Ингредиенты продукта " <?php echo Prepack::model()->findbypk($pid)->name; ?> "</h1>

<?php $this->renderPartial('_form', array('models'=>$models,'pid'=>$pid)); ?>