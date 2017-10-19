<?php

foreach ($prodcats as $prodmod) {
//$session = Yii::app()->session;
//$session['post'] = Yii::app()->easyImage->thumbSrcOf('images/product/' . $prodmod->image,array('quality'=>10, 'resize'=>array('width'=> 100)));
$prodsvi = '<div id="prodorder">
<div id="prodorder-image">
<img id="prodimg" title="Цена: ' . $prodmod->price .'
Вес: ' . $prodmod->description . '" src="tmb_images/product/' . $prodmod->image . '">
</div>
<div id="prodorder-name">
<span id="prodspan">' . $prodmod->name . '</span>
</div>
</div>'; ?>
<?php
$plin = "padd" . $prodmod->id;
echo CHtml::ajaxLink($prodsvi, CController::createUrl('order/addtolist'), 
	array('type'=>'POST',
	'url'=>'$(this).attr("href")',
'data'=>array('prodadd'=>$prodmod->id),
'update'=>'#order-calc',
),
array(
'id'=>uniqid(),
)
);
}
?>
