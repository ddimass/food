<?php
/* @var $this ProductController */
/* @var $model Product 

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Обновить',
);
*/
$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Создать новый', 'url'=>array('create')),
//	array('label'=>'View Product', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Обновление продукта "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'pcmodel'=>$pcmodel)); ?>