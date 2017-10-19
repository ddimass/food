<?php
/* @var $this CashController */
/* @var $model Cash */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cash-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_cost'); ?>
		<?php echo $form->textField($model,'hall_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hall_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_count'); ?>
		<?php echo $form->textField($model,'hall_count'); ?>
		<?php echo $form->error($model,'hall_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_p_count'); ?>
		<?php echo $form->textField($model,'hall_p_count'); ?>
		<?php echo $form->error($model,'hall_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_apr_check'); ?>
		<?php echo $form->textField($model,'hall_apr_check',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hall_apr_check'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_cost'); ?>
		<?php echo $form->textField($model,'deli_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'deli_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_count'); ?>
		<?php echo $form->textField($model,'deli_count'); ?>
		<?php echo $form->error($model,'deli_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_p_count'); ?>
		<?php echo $form->textField($model,'deli_p_count'); ?>
		<?php echo $form->error($model,'deli_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_apr_check'); ?>
		<?php echo $form->textField($model,'deli_apr_check',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'deli_apr_check'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_cost'); ?>
		<?php echo $form->textField($model,'day_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'day_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_count'); ?>
		<?php echo $form->textField($model,'day_count'); ?>
		<?php echo $form->error($model,'day_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_p_count'); ?>
		<?php echo $form->textField($model,'day_p_count'); ?>
		<?php echo $form->error($model,'day_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day_apr_check'); ?>
		<?php echo $form->textField($model,'day_apr_check',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'day_apr_check'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_man'); ?>
		<?php echo $form->textField($model,'hall_man',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'hall_man'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hall_man_cost'); ?>
		<?php echo $form->textField($model,'hall_man_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hall_man_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_man'); ?>
		<?php echo $form->textField($model,'deli_man',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'deli_man'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deli_man_cost'); ?>
		<?php echo $form->textField($model,'deli_man_cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'deli_man_cost'); ?>
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