<?php
/* @var $this Product_easyController */

$this->breadcrumbs=array(
	'Добавление продукта',
);
$this->menu=array(
		array('label'=>'Посмотреть продукцию', 'url'=>array('Product/admin')),
		array('label'=>'Посмотреть', 'url'=>array('Product/admin')),
  );
?>
 
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>


<div class="form">
<?php
echo CHtml::beginForm('','post', array('enctype'=>'multipart/form-data'));
$select = 'help';
?>

<?php
Yii::import('ext.widgets.select2.XSelect2');
echo time();
$models = Kitchen::model()->findall(array('order'=>'name'));
$list = CHtml::listData($models,'id','name');
/*
// echo CHtml::Textfield('name');
// echo CHtml::DropDownList('select',$select,$list);

// echo CHtml::form('','post',array('enctype'=>'multipart/form-data'));
// echo CHtml::beginingform();
*/

echo '<div class="row">';
echo CHtml::activeLabel($model,'Наименование продукта');
echo CHtml::activeTextField($model,'name',array('style'=>'width:277px')); 
echo '</div>';
echo '<div class="row">';
echo CHtml::activeLabel($model,'Выберите кухню');
$this->widget('ext.widgets.select2.XSelect2', array(
    'model'=>$model,
    // 'attribute'=>'id',
    'attribute'=>'tbl_kitchen_id',
    'data'=>$list,
    'htmlOptions'=>array(
    'style'=>'width:300px;',
    'value'=>'cat',
    ),
));
echo '</div>';
echo '<div class="row">';
echo CHtml::activeLabel($model,'Описание');
echo CHtml::activeTextField($model,'description',array('style'=>'width:277px')); 
echo '</div>';

echo '<div class="row">';
echo CHtml::activeLabel($model,'Избражение продукта');
echo CHtml::activeFileField($model,'image',array('style'=>'width:277px')); 
echo '</div>';

echo '<div class="row">';
echo CHtml::activeLabel($model,'Сортировка');
echo CHtml::activeTextField($model,'sort',array('style'=>'width:277px')); 
echo '</div>';


echo '<div class="row submit">';
echo CHtml::submitButton('Добавить');
echo '</div>';
/* */
/* 
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    // 'model'=>$model,
    // 'attribute'=>'name',
    'id'=>'cat_id',
    'name'=>'cat',
    'source'=>array_values($list),
    'htmlOptions'=>array(
        'size'=>'40'
    ),
));
*/
?>

</form>
