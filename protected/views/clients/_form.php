<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clients-form',
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
		<?php echo $form->labelEx($phmodel,'phone'); ?>
		<?php echo $form->textField($phmodel,'phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($phmodel,'phone'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($admodel,'address'); ?>
		<?php echo $form->textField($admodel,'address',array('size'=>100,'maxlength'=>200)); ?>
		<?php echo $form->error($admodel,'address'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_discount_type_id'); ?>
		<?php $lists = DiscountType::model()->findall();
		$list = CHtml::listData($lists,'id','type');
		$this->widget('ext.widgets.select2.XSelect2', array(
    				'model'=>Clients::model(),
    				'attribute'=>'tbl_discount_type_id',
    				'data'=>$list,
    				'htmlOptions'=>array(
            				'style'=>'width:200px;',
    				),
		)); ?>
		<?php echo $form->error($model,'tbl_discount_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blocked'); ?>
		<?php echo $form->textField($model,'blocked'); ?>
		<?php echo $form->error($model,'blocked'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->
