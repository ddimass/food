<?php
/* @var $this CountInController */
/* @var $model CountIn */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'count-in-form',
	// Please note: When you enable ajax validation, make sure the corresponding

	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'tbl_unit_id'); ?>
		<?php echo $form->dropdownlist($model,'tbl_unit_id',CHtml::listdata(Unit::model()->findall(),'id','name')); ?>
		<?php echo $form->error($model,'tbl_unit_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->