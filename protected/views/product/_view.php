<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div style="height:120px;" class="view">
<div style="float:left;">
	<?php //echo CHtml::encode($data->getAttributeLabel('id')); ?>
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('Название продукта')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Стоимость')); ?>:</b>
	<?php echo CHtml::encode($data->price).' руб'; ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Себестоимость')); ?>:</b>
	<?php echo CHtml::encode($data->own_price).' руб'; ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('Описание')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Кухня')); ?>:</b>
	<?php echo CHtml::encode(Kitchen::model()->findbypk($data->tbl_kitchen_id)->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Название картинки')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Порядок сортировки')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />
</div>
<div style="float:right;">
<img width=70 height=70 src='images/product/<?php echo CHtml::encode($data->image) ?> '>
</div>

</div>