<?php
/* @var $this InvoiceController */
/* @var $data Invoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_provider_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_provider_id); ?>
	<br />


</div>