<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
// $session = Yii::app()->session;
// $session['clid'] = -1;
?>

<div class="form">
<div id=lim>
<?php	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'mydialog',
			'options'=>array(
				'title'=>'Клиент',
				'autoOpen'=>false,
			),
	));
	if ($model->isnewrecord) {
	$clmodel = new Clients;
	$admodel = new Address;
	$phmodel = new Phones;
	}
	echo $this->renderPartial('_clientf',array('model'=>$clmodel,'admodel'=>$admodel,'phmodel'=>$phmodel));
	$this->endWidget('zii.widgets.jui.CJuiDialog');
	?>
	</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<div id="order-filter">
	<div id="orderclient" class="row" style="float: left;">
		<?php $this->renderPartial('_client', array('model'=>$model,'phlists'=>$phlists)) ?>
	</div>
	<div id="order-clientf" style="float: left;">
	<?php
	echo CHtml::Link('Клиент', '#', array('onclick'=>'$("#mydialog").dialog("open"); return false;')) ?>
	</div>
	<div class="row" style="clear: both;">
		<?php echo $form->labelEx($model,'tbl_courier_id'); ?>
		<?php // echo $form->textField($model,'tbl_courier_id'); 
		$coulists = Courier::model()->findall();
		$coulist = CHtml::listData($coulists,'id','name');
		$this->widget('ext.widgets.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'tbl_courier_id',
				'data'=>$coulist,
				'options'=>array(
//					'placeholder'=>'--Выбрать курьера--',
				),
				'htmlOptions'=>array(
					'style'=>'width: 300px;',
				),
				'events'=>array(
					'selected'=>'js:function(ele) {
					$.ajax({
					type: "POST",
					cache: false,
					url: "/index.php?r=order/courier",
					data: ({coid : ele.val}),
					})
					}',
				),
		));
		?>
		<?php echo $form->error($model,'tbl_courier_id'); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'tbl_state_id'); ?>
		<?php // echo $form->textField($model,'tbl_state_id'); 
		$stalists = State::model()->findall();
		$stalist = CHtml::listData($stalists,'id','name');
		$this->widget('ext.widgets.select2.XSelect2', array(
				'model'=>$model,
				'attribute'=>'tbl_state_id',
				'data'=>$stalist,
				'options'=>array(
				//	'placeholder'=>'--Выбрать курьера--',
				),
				'htmlOptions'=>array(
					'style'=>'width: 300px;',
				),
		));

		
		?>
		<?php echo $form->error($model,'tbl_state_id'); ?>	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cash') ?>
		<?php echo $form->textField($model,'cash') ?>
	
		<?php echo $form->error($model,'cash'); ?>	
	</div>	
	</div>
	<div id="order-calc">
	<?php $this->renderPartial('_orderlist', array('orderlist'=>$orderlist)) ?>
	</div>
	
	<div id="order-cat">
	<?php
	$catslist = Cat::model()->findall();
	foreach ($catslist as $cat) {
	$ordcat = '<div id="order-cats">' . "$cat->name"  . '</div>';
	 echo CHtml::ajaxLink($ordcat, CController::createUrl('order/ajax&catid='.$cat->id), array('update'=>'#order-prod'),array('id'=>$cat->id));
	 echo '<hr id=order-cat-id-hr>';
	 }
	$ordcat = '<div id="order-cats">Все категории</div>';
	 echo CHtml::ajaxLink($ordcat, CController::createUrl('order/ajax&catid=-1'), array('update'=>'#order-prod'), array('id'=>'-1'));
	?>
	</div>
	<div id="order-prod">
	<?php $this->renderPartial('_prods', array('prodcats'=>$prodcats)) ?>
	</div>
	<div id="order-totlist">
	
	</div>
	<div id="order-status">
		<div style="padding-left: 20px;line-height: 25px; vertical-align: center; height: 25px; float: left; padding-right: 20px;"><?php echo CHtml::activelabel($model,'description'); ?></div>
		<?php echo $form->textField($model,'description',array('size'=>120,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
		<?php if ($model->tbl_state_id<3000) {echo CHtml::submitButton($model->isNewRecord ? 'Оформить заказ' : 'Save'); }?>
		</div>

	<div class="row buttons">
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->