<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для запонения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Название продукта <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Стоимость <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Описание'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Выбрать категорию <span class="required">*</span>'); 		?>
		<?php
		$lists = Cat::model()->findall(array('order'=>'name'));
		$list = CHtml::listData($lists,'id','name');
		$this->widget('ext.widgets.select2.XSelect2', array(
			'model'=>$pcmodel,
			'attribute'=>'tbl_cat_id',
			'data'=>$list,
			'htmlOptions'=>array(
			'style'=>'width:700px;',
			'multiple'=>'true',
		),
		));
		?>
		<?php  echo $form->error($model,'tbl_kitchen_id'); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Выбрать кухню <span class="required">*</span>'); 		?>
		<?php // echo $form->textField($model,'tbl_kitchen_id'); 
		$lists = Kitchen::model()->findall(array('order'=>'name'));
		$list = CHtml::listData($lists,'id','name');
		$this->widget('ext.widgets.select2.XSelect2', array(
			'model'=>$model,
			'attribute'=>'tbl_kitchen_id',
			'data'=>$list,
			'htmlOptions'=>array(
			'style'=>'width:300px;',
			'value'=>'cat',
		),
		));
		?>
		<?php  echo $form->error($model,'tbl_kitchen_id'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Выбрать картинку'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Порядок сортировки'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->Checkbox($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>
	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
