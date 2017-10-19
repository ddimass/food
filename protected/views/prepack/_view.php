<?php
/* @var $this PrepackController */
/* @var $data Prepack */
?>

<div style="height:90px;" class="view">
<div style="float:left;">
	<?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>
	<?php // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php // echo CHtml::encode($data->getAttributeLabel('image')); ?>
	<?php  // echo CHtml::encode($data->image); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('out')); ?>:</b>
	<?php echo CHtml::encode($data->out); 
	?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); 
	?>
	</div>
	<div style="float:right;">
	<img width=70 height=70 src='images/prepack/<?php echo CHtml::encode($data->image) ?> '>
	</div>


</div>