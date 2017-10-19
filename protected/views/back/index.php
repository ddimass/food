<?php
/* @var $this BackController */
echo "<h1>Background Process TEST</h1>  <br>";
echo "Progress: <div id='test'></div><br>";
echo CHtml::script("$(function(){ setInterval(function(){ $('#test').load('".$this->createUrl('back/getStatus')."');}, 1000);});");
?>
