<?php
/* @var $this ProductIngredController */
/* @var $model ProductIngred */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-prepack-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(ProductPrepack::model()); ?>

	<div class="row">
		<?php // echo $form->labelEx($model,'tbl_product_id'); ?>
		<?php echo $form->textField(PrepackIngred::model(),'tbl_prepack_id', array('style'=>'display:none;','value'=>$pid)); ?>
		<?php echo $form->dropDownList(PrepackIngred::model(),'tbl_ingred_id',CHtml::listData(Prepack::model()->findall(),'id','name'),array('style'=>'display:none;')); ?>
		<?php echo $form->textField(PrepackIngred::model(),'count',array('style'=>'display:none;','value'=>12345678)); ?>

		<?php // echo $form->error($model,'tbl_product_id'); 
	?>
	</div>
	<div class="row">
		<?php // echo $form->labelEx($model,'tbl_product_id'); ?>
		<?php echo $form->textField(PrepackPrepack::model(),'tbl_prepack_id', array('style'=>'display:none;','value'=>$pid)); ?>
		<?php echo $form->dropDownList(PrepackPrepack::model(),'prepack_id',CHtml::listData(Prepack::model()->findall(),'id','name'),array('style'=>'display:none;')); ?>
		<?php echo $form->textField(PrepackPrepack::model(),'count',array('style'=>'display:none;','value'=>12345678)); ?>

		<?php // echo $form->error($model,'tbl_product_id'); 
	?>
	</div>
	<div style="float:left; border: 1px solid #aaa;width: 400px; padding: 10px;">
	<div style="float:left; width:45%;padding: 3px;">
		<?php echo $form->labelEx(PrepackIngred::model(),'tbl_ingred_id'); ?>
	</div>
	<div style="float:right; width:45%;">
		<?php echo $form->labelEx(PrepackIngred::model(),'count'); ?>
	</div>
	<?php for ($i = 0;$i<=10;$i++) {
	$model = new PrepackIngred;
	if (array_key_exists($i,$models)) {$model = $models[$i];
//	$session = Yii::app()->session;
//	$session['post'] = $model;
//	$this->redirect(array('test/index'));
	}
	?>
	
	<hr>
	<div style="float:left; width:45%; height:63px;">
		<?php // echo  $form->labelEx($model,'tbl_ingred_id'); 
		?>
		<?php echo $form->dropDownList($model,"[$i]tbl_ingred_id",CHtml::listData(Ingred::model()->findall(),'id','name')); ?>
		<?php // echo $form->error($model,"tbl_ingred_id"); ?>
	</div>
	<div style="float:right;width:45%;height:63px;">
		<?php // echo  $form->labelEx($model,'count'); 
		?>
		<?php echo $form->textField($model,"[$i]count"); ?>
		<?php // echo $form->error($model,"count"); ?>
	</div>

	<?php } ?>
	</div>
	<div style="float:right; border: 1px solid #aaaaaa;width: 400px; padding: 10px;">
	<div style="float:left; width:45%;padding: 3px;">
		<?php echo $form->labelEx(PrepackPrepack::model(),'prepack_id'); ?>
	</div>
	<div style="float:right; width:45%;">
		<?php echo $form->labelEx(PrepackPrepack::model(),'count'); ?>
	</div>
	<?php for ($i = 0;$i<=10;$i++) {
	$premodel = new PrepackPrepack;
	if (array_key_exists($i,$premodels)) {$premodel = $premodels[$i];
//	$session = Yii::app()->session;
//	$session['post'] = $model;
//	$this->redirect(array('test/index'));
	}
	?>
	
	<hr>
	<div style="float:left; width:45%; height:63px;">
		<?php // echo  $form->labelEx($model,'tbl_ingred_id'); 
		?>
		<?php echo $form->dropDownList($premodel,"[$i]prepack_id",CHtml::listData(Prepack::model()->findall(),'id','name')); ?>
		<?php // echo $form->error($model,"tbl_ingred_id"); ?>
	</div>
	<div style="float:right;width:45%;height:63px;">
		<?php // echo  $form->labelEx($model,'count'); 
		?>
		<?php echo $form->textField($premodel,"[$i]count"); ?>
		<?php // echo $form->error($model,"count"); ?>
	</div>

	<?php } ?>
	</div>
<hr>
	<div style="float:left;width:100%;height:63px;">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->