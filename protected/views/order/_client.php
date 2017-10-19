<?php
// $session = Yii::app()->session;
// $session['clid'] = -1;
echo CHtml::activelabel($model,'tbl_client_id');
// $lists = Phones::model()->findall();
$list = CHtml::listData($phlists,'tbl_clients_id','phone');
 $this->widget('ext.widgets.select2.XSelect2', array(
		'model'=>$model,
		'attribute'=>'tbl_client_id',
		'data'=>$list,
		'options'=> array(
		'placeholder' => '--Выбрать клиента--',
		'allowClear'=>true,
		),
		'htmlOptions'=>array(
			'style'=>'width: 300px;',
		),
		'events'=>array(
				'selected'=>'js:function(element){
				$.ajax({
				type: "POST",
				cache: false,
				url: "/index.php?r=order/clientview",
				data: ({clientid : element.val}),
				dataType: "json",
				beforeSend: function(e) {
				
				}, 
				success: function(s) {
				jQuery("#mydialog").html(s);
				$("#mydialog").dialog("open");
				}
				}
				)}',
				'removed'=>'js:function(element){
				$.ajax({
				type: "POST",
				cache: false,
				url: "/index.php?r=order/clientview",
				data: ({clientid : -1}),
				dataType: "json",
				beforeSend: function(e) {
				$("#mydialog").dialog("open");
				}, 
				success: function(s) {
				jQuery("#mydialog").html(s);
				}
				}
				)}',
		),
		));
		
/* $this->widget('ext.widgets.select22.ESelect2', array(
		'model' => $model,
		'attribute' => 'tbl_client_id',
		'data' => $list,
		)
); */
// echo $form->error($model, 'tbl_client_id');
?>