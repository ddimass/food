<?php
/* @var $this ProductCatController */
/* @var $model ProductCat */
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
		<?php echo $form->label($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_product_id'); ?>
		<?php echo $form->textField($model,'tbl_product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tbl_cat_id'); ?>
		<?php echo $form->textField($model,'tbl_cat_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->