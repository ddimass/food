<?php
/* @var $this DaySumController */
/* @var $model DaySum */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'day-sum-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dt'); ?>
		<?php echo $form->textField($model,'dt'); ?>
		<?php echo $form->error($model,'dt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_in'); ?>
		<?php echo $form->textField($model,'count_in'); ?>
		<?php echo $form->error($model,'count_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost_in'); ?>
		<?php echo $form->textField($model,'cost_in',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cost_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_out'); ?>
		<?php echo $form->textField($model,'count_out'); ?>
		<?php echo $form->error($model,'count_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost_out'); ?>
		<?php echo $form->textField($model,'cost_out',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cost_out'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->