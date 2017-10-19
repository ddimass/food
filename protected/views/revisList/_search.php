<?php
/* @var $this RevisListController */
/* @var $model RevisList */
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
		<?php echo $form->label($model,'tbl_ingred_id'); ?>
		<?php echo $form->textField($model,'tbl_ingred_id'); ?>
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
		<?php echo $form->label($model,'count_in'); ?>
		<?php echo $form->textField($model,'count_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'margin'); ?>
		<?php echo $form->textField($model,'margin'); ?>
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