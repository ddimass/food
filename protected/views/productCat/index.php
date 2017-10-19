<?php
/* @var $this ProductCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Cats',
);

$this->menu=array(
	array('label'=>'Create ProductCat', 'url'=>array('create')),
	array('label'=>'Manage ProductCat', 'url'=>array('admin')),
);
?>

<h1>Product Cats</h1>

<?php /* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */
foreach ($cats as $cat) {
echo '<div style="padding: 2px; margin: 2px;border: 1px solid #AAA;float:left;width:80px; height:90px;">';
echo '<div style="text-align: center;">';
echo '<img width="70px" height="70px" src=images/'.$cat->image .'>';
echo '</div>';
echo '<div style="text-align: center;background: #aaa;">';
echo $cat->name;
echo '</div>';
echo '</div>';
} 
?>
