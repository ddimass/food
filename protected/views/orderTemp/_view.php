<?php
/* @var $this OrderTempController */
/* @var $data OrderTemp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('random')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->random), array('view', 'id'=>$data->random)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />


</div>