<?php
/* @var $this CatController */
/* @var $data Cat */
?>

<div style="height:90px" class="view">
<div style="float:left;">
	<?php // echo CHtml::encode($data->getAttributeLabel('id')); ?>
	<?php  // echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php if (CHtml::encode($data->enabled)){echo 'Да';} else {echo 'Нет';}  ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />
</div>
<div style="float:right">
<img width=70 height=70 src='images/cat/<?php echo CHtml::encode($data->image) ?> '>
</div>

</div>