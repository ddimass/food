<?php
/* @var $this RevisListController */
/* @var $model RevisList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'revis-list-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_ingred_id'); ?>
		<?php echo $form->textField($model,'tbl_ingred_id'); ?>
		<?php echo $form->error($model,'tbl_ingred_id'); ?>
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
		<?php echo $form->labelEx($model,'count_in'); ?>
		<?php echo $form->textField($model,'count_in'); ?>
		<?php echo $form->error($model,'count_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'margin'); ?>
		<?php echo $form->textField($model,'margin'); ?>
		<?php echo $form->error($model,'margin'); ?>
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