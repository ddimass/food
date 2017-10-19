<?php
/* @var $this ProductCatController */
/* @var $data ProductCat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_cat_id); ?>
	<br />


</div>