<?php
/* @var $this OrderStateController */
/* @var $data OrderState */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_order_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_order_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_time')); ?>:</b>
	<?php echo CHtml::encode($data->date_time); ?>
	<br />


</div>