<?php
/* @var $this ProductController */
/* @var $model Product */

/* $this->breadcrumbs=array(
	'Products'=>array('index'),
	'Управление продуктами',
);
*/
$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Добавить продукт', 'url'=>array('Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление продуктами</h1>

<p>Вы можете следующие символы (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале критерия для поиска.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		array('name'=>'name','header'=>'Название'),
		array('name'=>'price','header'=>'Стоимость (руб)'),
		array('name'=>'own_price','header'=>'Себестоимость (руб)'),
		array('name'=>'description','header'=>'Описание'),
		array('name'=>'tbl_kitchen_id','header'=>'Кухня','value'=>'Kitchen::model()->findbypk($data->tbl_kitchen_id)->name', ),
		array('name'=>'image','header'=>'Название картинки'),
		array('name'=>'sort','header'=>'Сортировка'),
		'enabled',
//		'description',
//		'tbl_kitchen_id',
//		'image',
//		'sort',
		array(
			'header'=>'Действия',
			//array('name'=>'name','header'=>'Название','value'=>),
			'class'=>'CButtonColumn',
			'template'=>'{update}{ingred}',
			'buttons'=>array
			(
				'ingred' => array
				(
					'label'=>'Полуфабрикаты',
					'url'=>'Yii::app()->createUrl("productPrepack/create",array("id"=>$data->id))',
				),
			),
		),
	),
)); ?>
