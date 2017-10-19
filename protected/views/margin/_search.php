<?php
/* @var $this MarginController */
/* @var $model Margin */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost_count'); ?>
		<?php echo $form->textField($model,'cost_count',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'own_cost'); ?>
		<?php echo $form->textField($model,'own_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'own_cost_count'); ?>
		<?php echo $form->textField($model,'own_cost_count',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'margin'); ?>
		<?php echo $form->textField($model,'margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'own_margin'); ?>
		<?php echo $form->textField($model,'own_margin'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'cat'); ?>
		<?php echo $form->textField($model,'cat'); ?>
	</div>
	


	<div class="row">
		<?php // echo $form->label($model,'desc'); ?>
		<?php // echo $form->textField($model,'desc',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->