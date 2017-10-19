<?php
/* @var $this UsersReportController */
/* @var $model UsersReport */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address'); ?>
		<?php echo $form->textField($model,'Address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_count'); ?>
		<?php echo $form->textField($model,'order_count',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apr_order_count'); ?>
		<?php echo $form->textField($model,'apr_order_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->