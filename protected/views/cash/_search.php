<?php
/* @var $this CashController */
/* @var $model Cash */
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
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_cost'); ?>
		<?php echo $form->textField($model,'hall_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_count'); ?>
		<?php echo $form->textField($model,'hall_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_p_count'); ?>
		<?php echo $form->textField($model,'hall_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_apr_check'); ?>
		<?php echo $form->textField($model,'hall_apr_check',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_cost'); ?>
		<?php echo $form->textField($model,'deli_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_count'); ?>
		<?php echo $form->textField($model,'deli_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_p_count'); ?>
		<?php echo $form->textField($model,'deli_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_apr_check'); ?>
		<?php echo $form->textField($model,'deli_apr_check',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_cost'); ?>
		<?php echo $form->textField($model,'day_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_count'); ?>
		<?php echo $form->textField($model,'day_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_p_count'); ?>
		<?php echo $form->textField($model,'day_p_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day_apr_check'); ?>
		<?php echo $form->textField($model,'day_apr_check',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_man'); ?>
		<?php echo $form->textField($model,'hall_man',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hall_man_cost'); ?>
		<?php echo $form->textField($model,'hall_man_cost',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_man'); ?>
		<?php echo $form->textField($model,'deli_man',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deli_man_cost'); ?>
		<?php echo $form->textField($model,'deli_man_cost',array('size'=>10,'maxlength'=>10)); ?>
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