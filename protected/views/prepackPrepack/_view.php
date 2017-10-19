<?php
/* @var $this PrepackPrepackController */
/* @var $data PrepackPrepack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_prepack_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_prepack_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prepack_id')); ?>:</b>
	<?php echo CHtml::encode($data->prepack_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />


</div>