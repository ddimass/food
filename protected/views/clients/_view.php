<?php
/* @var $this ClientsController */
/* @var $data Clients */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode('Telephone') ?>:</b>
	<?php echo CHtml::encode(Phones::model()->findbyattributes(array('tbl_clients_id'=>$data->id))->phone); ?>
	<br />
	<b><?php echo CHtml::encode('Address'); ?>:</b>
	<?php echo CHtml::encode(Address::model()->findbyattributes(array('tbl_clients_id'=>$data->id))->address); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_discount_type_id')); ?>:</b>
	<?php echo CHtml::encode(DiscountType::model()->findbypk($data->tbl_discount_type_id)->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blocked')); ?>:</b>
	<?php echo CHtml::encode($data->blocked); ?>
	<br />


</div>