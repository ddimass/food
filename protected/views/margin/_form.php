<?php
/* @var $this MarginController */
/* @var $model Margin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'margin-form',
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
		<?php echo $form->error($model,'count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost_count'); ?>
		<?php echo $form->textField($model,'cost_count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cost_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'own_cost'); ?>
		<?php echo $form->textField($model,'own_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'own_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'own_cost_count'); ?>
		<?php echo $form->textField($model,'own_cost_count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'own_cost_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'margin'); ?>
		<?php echo $form->textField($model,'margin'); ?>
		<?php echo $form->error($model,'margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'own_margin'); ?>
		<?php echo $form->textField($model,'own_margin'); ?>
		<?php echo $form->error($model,'own_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->