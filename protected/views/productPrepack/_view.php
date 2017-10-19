<?php
/* @var $this ProductIngredController */
/* @var $data ProductIngred */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_ingred_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_ingred_id); ?>
	<br />


</div>