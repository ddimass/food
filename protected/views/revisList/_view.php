<?php
/* @var $this RevisListController */
/* @var $data RevisList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_ingred_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_ingred_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_in')); ?>:</b>
	<?php echo CHtml::encode($data->count_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('margin')); ?>:</b>
	<?php echo CHtml::encode($data->margin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />


</div>