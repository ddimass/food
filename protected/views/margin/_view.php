<?php
/* @var $this MarginController */
/* @var $data Margin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt')); ?>:</b>
	<?php echo CHtml::encode($data->dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_count')); ?>:</b>
	<?php echo CHtml::encode($data->cost_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('own_cost')); ?>:</b>
	<?php echo CHtml::encode($data->own_cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('own_cost_count')); ?>:</b>
	<?php echo CHtml::encode($data->own_cost_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('margin')); ?>:</b>
	<?php echo CHtml::encode($data->margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('own_margin')); ?>:</b>
	<?php echo CHtml::encode($data->own_margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	*/ ?>

</div>