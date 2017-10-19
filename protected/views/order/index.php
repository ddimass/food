<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Новый заказ',
);
*/
$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<?php // echo "<h1>Новый заказ</h1>"; ?>

<?php //$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view',)); 
?>
<div id="order-filter">
<?php
$clmodel = new Clients;
$admodel = new Address;
$phmodel = new Phones;

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Новый клиент',
        'autoOpen'=>false,
    ),
));
//echo 'htfhgfh';
echo $this->renderPartial('/clients/_form', array('model'=>$clmodel,'admodel'=>$admodel,'phmodel'=>$phmodel));
$this->endWidget('zii.widgets.jui.CJuiDialog');

$form = $this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	));

echo $form->labelEx($order,'tbl_client_id',array("style"=>"font-weight: bold;"));
echo '<br>';
$lists = Phones::model()->findall();
$list = CHtml::listData($lists,'tbl_client_id','phone');
$this->widget('ext.widgets.select2.XSelect2', array(
	'model'=>$order,
	'attribute'=>'tbl_client_id',
	'data'=>$list,
	'options'=>array(
	'placeholder'=>'--Выбрать клиента--',
	),
	'htmlOptions'=>array(
	'style'=>'width: 200px;',
	),
	));

echo CHtml::link('Добавить', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
)); 
echo '<hr>';
echo $form->labelEx($order,'tbl_user_id',array("style"=>"font-weight: bold;"));
echo '<br>';

echo Yii::app()->user->name;
echo '<hr>';
echo $form->labelEx($order,'tbl_courier_id',array("style"=>"font-weight: bold;"));
echo '<br>';
$lists = Courier::model()->findall();
$list = CHtml::listData($lists,'id','name');
$this->widget('ext.widgets.select2.XSelect2', array(
	'model'=>$order,
	'attribute'=>'id',
	'data'=>$list,
	'options'=>array(
	'placeholder'=>'--Выбрать курьера--',
	'width'=>'200px',
	),
	));
?>
</div>
<div id="order-calc">

</div>
<div id="order-total">

</div>
<div id="order-cat">
<?php
$cats  = Cat::model()->findall();
foreach ($cats as $cat) {
?>
<div id=order-cats>
<?php echo CHtml::ajaxLink($cat->name, '', array(
	'type' => 'GET',
	'update' => 'order-prod',
	));


?>
</div>
</a>
<hr id=order-cat-id>
<?php } ?>
<a href=index.php?r=order/ajax&catid=-1>
<div id=order-cats>
<?php echo "<span id=order-cats-span>" . "Все категории" . "</span>"; ?>
</div>
</a>
<hr id=order-cat-id>
</div>
<div id="order-prod">
<?php
$prodmods = array();
if ($catid < 0) {
$prodmods  = Product::model()->findall(); }
else {
$prodcats  = ProductCat::model()->findallbyattributes(array('tbl_cat_id'=>$catid)); 
$i=0;
foreach ($prodcats as $prodcat) {
$prodmods["$i"] = Product::model()->findbypk($prodcat->tbl_product_id);
$i=$i+1;
}
}
foreach ($prodmods as $prodmod) {
?>
<div id=prodorder>
<div id=prodorder-image>
<img id=prodimg src="images/product/<?php echo $prodmod->image; ?> ">
</div>
<div id=prodorder-name>
<?php echo "<span id=prodspan>". $prodmod->name . "</span>"; ?>
</div>
</div>
<?php
}
?>

</div>
<div id="order-totlist">

</div>
<div id="order-status">
<?php echo CHtml::submitButton($order->isNewRecord ? 'Создать' : 'Сохранить'); ?>
</div>
<?php $this->endWidget(); ?>
