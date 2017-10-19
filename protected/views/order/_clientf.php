<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
//$session = Yii::app()->session;
//$session['clid']=1;
?>

<div class="form">

<?php  $form=$this->beginWidget('CActiveForm', array(
	 'id'=>'clients-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	 'enableAjaxValidation'=>true,
	// 'action'=> CHtml::normalizeURL(array('order/addclient')),
 )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" style="display: none;">
		<?php // echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php // echo $form->error($model,'id'); ?>
	</div>

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
		<?php echo $form->textField($admodel,'address',array('size'=>100,'maxlength'=>45)); ?>
		<?php echo $form->error($admodel,'address'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_discount_type_id'); ?>
		<?php $lists = DiscountType::model()->findall();
		$list = CHtml::listData($lists,'id','type');
		$this->widget('ext.widgets.select2.XSelect2', array(
    				'model'=>$model,
    				'attribute'=>'tbl_discount_type_id',
    				'data'=>$list,
    				'htmlOptions'=>array(
            				'style'=>'width:280px;',
    				),
		)); ?>
		<?php echo $form->error($model,'tbl_discount_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blocked'); ?>
		<?php echo $form->dropDownList($model,'blocked',array('0'=>'Нет','1'=>'Да')); ?>
		<?php echo $form->error($model,'blocked'); ?>
	</div>
	<?php 
	
	 ?>
	<div class="row buttons">
	<?php // echo CHtml::SubmitButton('Cjplkfnm'); ?>
		<?php   echo CHtml::ajaxsubmitButton(
				$phmodel->isNewRecord ? 'Добавить' : 'Всё правильно', 
				CController::createUrl('order/addclient'),
				array(
					'type' => 'POST',
					'update' => '#orderclient',
					'dataType' => 'json',
					'success'=>'js:function(e){
					$("#mydialog").dialog("close");
					jQuery("#orderclient").html(e);
					$("#orderclient").select2;
					}',
				),
				array(
				'id'=>'popup'
				)
		); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
