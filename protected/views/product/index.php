<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider 

$this->breadcrumbs=array(
	'Продукты',
);
*/
$this->menu=array(
	array('label'=>'Создание продуктов', 'url'=>array('Create')),
	array('label'=>'Управление продуктами', 'url'=>array('Admin')),
);
?>

<h1>Продукты</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
//echo '<img src="images/' . $model->image . '" width="200px">';
//$lim = $dataProvider->getData();
//echo '<img src="images/' . $lim[0]['image'] . '" width="200px">';

//print_r($lim);
?>

