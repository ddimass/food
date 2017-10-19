<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div style="float: left; width: 20%;" class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->dateField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
</div>
<div style="width: 40%;float: left;" class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div style="float: left" class="row">
		<?php echo $form->labelEx($model,'tbl_provider_id'); ?>
		<?php echo $form->dropdownlist($model,'tbl_provider_id',CHtml::listdata(Provider::model()->findall(),'id','name')); ?>
		<?php echo $form->error($model,'tbl_provider_id'); ?>
	</div>
<hr />
<div style="float:left;width: 23%; padding-left:30px;">
<?php $inginv1 = new IngredInvoice;
echo $form->labelEx($inginv1,'tbl_ingred_id'); ?>
</div>
<div style="float:left;width: 20%;">
<?php echo $form->labelEx($inginv1,'count'); ?>
</div>
<div style="float:left;">
<?php echo $form->labelEx($inginv1,'cost'); ?>
</div>
<hr />
<?php for ($i=0;$i<=25;$i++) { 
$inginv = new IngredInvoice;
if (isset($inginvs)){
if (array_key_exists($i,$inginvs)){$inginv=$inginvs[$i];}
}
?>

<div style="float:left;width: 20%;padding: 20px;">
<?php echo $form->dropdownlist($inginv,"[$i]tbl_ingred_id",CHtml::listdata(Ingred::model()->findall(),'id','name')); ?>
</div>
<div style="float:left;width: 20%;padding-top: 20px;">
<?php echo $form->textfield($inginv,"[$i]count"); ?>
</div>
<div style="float:left;padding-top: 20px;">
<?php echo $form->textfield($inginv,"[$i]cost"); ?>
</div>
<hr />
<?php } ?>

	<div style="float: left;" class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->