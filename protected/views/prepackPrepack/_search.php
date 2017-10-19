<?php
/* @var $this PrepackPrepackController */
/* @var $model PrepackPrepack */
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
		<?php echo $form->label($model,'tbl_prepack_id'); ?>
		<?php echo $form->textField($model,'tbl_prepack_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prepack_id'); ?>
		<?php echo $form->textField($model,'prepack_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'count'); ?>
		<?php echo $form->textField($model,'count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->