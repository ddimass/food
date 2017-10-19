<?php
/* @var $this DaySumController */
/* @var $data DaySum */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt')); ?>:</b>
	<?php echo CHtml::encode($data->dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_in')); ?>:</b>
	<?php echo CHtml::encode($data->count_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_in')); ?>:</b>
	<?php echo CHtml::encode($data->cost_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_out')); ?>:</b>
	<?php echo CHtml::encode($data->count_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost_out')); ?>:</b>
	<?php echo CHtml::encode($data->cost_out); ?>
	<br />


</div>