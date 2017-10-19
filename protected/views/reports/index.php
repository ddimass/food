<?php
		/* @var $this ReportsController */
	/*
	$this->breadcrumbs=array(
'Reports',
);
*/
?>
<h1>Отчёты</h1>
<h3>
<ul>
<li><?php  echo CHtml::Link('Сформировать отчёт по клиентам', array('/UsersReport/csv'), array('target'=>'_blank','title'=>'Отчёт по клиентам')); ?></li>
<li><?php  echo CHtml::Link('Отчёт по ингредиентам в составе продукта', array('/ingred_in_prods/index'), array('target'=>'_blank','title'=>'Ингредиенты в продуктах')); ?></li>
<li> 
<?php echo CHtml::Link('Расчёт себестоимости', array('/Own_cost/index'), array('target'=>'_blank','title'=>'Себестоимость')); ?>
</li>

<li>
<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-marg',
	'action'=>'index.php?r=margin/Admin',
	)); 
?>
	<?php  echo CHtml::dateField('day',date("Y-m-d")); ?>
	<?php  echo CHtml::dateField('dayn',date("Y-m-d", strtotime("+1 days"))); ?>
	<?php  echo CHtml::submitButton('Анализ себестоимости'); ?>
	<?php  $this->endWidget(); 
	

//echo CHtml::Link('Сформировать отчёт по остаткам (чистый)', array('/reports/reviscl'), array('target'=>'_blank','title'=>'Отчёт по остаткам')); 
?>
</li>


<li>
<?php  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-orderday',
	'action'=>'index.php?r=cash/Admin',
	)); 
?>
	<?php  echo CHtml::dateField('day',date("Y-m-d")); ?>
	<?php  echo CHtml::dateField('dayn',date("Y-m-d", strtotime("+1 days"))); ?>
	<?php  echo CHtml::submitButton('Анализ выручки по дням'); ?>
	<?php  $this->endWidget(); 
	?>
</li>

</ul>
</h3>
