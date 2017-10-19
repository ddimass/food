<?php
/* @var $this PlacesController */
/* @var $model Places */

$this->breadcrumbs=array(
	'Places'=>array('index'),
	$model->name,
);

$this->menu=array(
//	array('label'=>'Список мест хранения', 'url'=>array('index')),
	array('label'=>'Добавить место хранения', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Places', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Места хранения', 'url'=>array('admin')),
);
?>

<h1>Место хранения "<?php echo $model->name; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phone',
		'Address',
		'check_string',
		'desc',
	),
)); ?>
