<?php
/* @var $this OrderListController */
/* @var $data OrderList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_order_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_order_id); ?>
	<br />


</div>