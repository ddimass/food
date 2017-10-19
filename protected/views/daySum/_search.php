<?php
/* @var $this DaySumController */
/* @var $model DaySum */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt'); ?>
		<?php echo $form->textField($model,'dt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_in'); ?>
		<?php echo $form->textField($model,'count_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost_in'); ?>
		<?php echo $form->textField($model,'cost_in',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count_out'); ?>
		<?php echo $form->textField($model,'count_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost_out'); ?>
		<?php echo $form->textField($model,'cost_out',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->