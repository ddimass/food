<?php
?>
<div id="data">
   <?php $this->renderPartial('_ajax', array('myValue'=>$myValue)); ?>
</div>

<?php echo CHtml::ajaxButton ("Update data",
                              CController::createUrl('ajax/ajax'), 
                              array('update' => '#data',array('my'=>'OK')));
?>

