<?php
/* @var $this CashController */
/* @var $data Cash */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
	<?php echo CHtml::encode($data->day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_cost')); ?>:</b>
	<?php echo CHtml::encode($data->hall_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_count')); ?>:</b>
	<?php echo CHtml::encode($data->hall_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_p_count')); ?>:</b>
	<?php echo CHtml::encode($data->hall_p_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_apr_check')); ?>:</b>
	<?php echo CHtml::encode($data->hall_apr_check); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_cost')); ?>:</b>
	<?php echo CHtml::encode($data->deli_cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_count')); ?>:</b>
	<?php echo CHtml::encode($data->deli_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_p_count')); ?>:</b>
	<?php echo CHtml::encode($data->deli_p_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_apr_check')); ?>:</b>
	<?php echo CHtml::encode($data->deli_apr_check); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_cost')); ?>:</b>
	<?php echo CHtml::encode($data->day_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_count')); ?>:</b>
	<?php echo CHtml::encode($data->day_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_p_count')); ?>:</b>
	<?php echo CHtml::encode($data->day_p_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day_apr_check')); ?>:</b>
	<?php echo CHtml::encode($data->day_apr_check); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_man')); ?>:</b>
	<?php echo CHtml::encode($data->hall_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hall_man_cost')); ?>:</b>
	<?php echo CHtml::encode($data->hall_man_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_man')); ?>:</b>
	<?php echo CHtml::encode($data->deli_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deli_man_cost')); ?>:</b>
	<?php echo CHtml::encode($data->deli_man_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	*/ ?>

</div>