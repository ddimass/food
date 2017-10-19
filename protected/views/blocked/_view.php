<?php
/* @var $this BlockedController */
/* @var $data Blocked */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_clients_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_clients_id); ?>
	<br />


</div>