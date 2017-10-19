<?php
/* @var $this ReportsadController */
?>

<h1>Отчёты</h1>
<h3>
<ul>
<li><?php echo CHtml::Link('Сформировать отчёт за день', array('/reports/orderday'), array('target'=>'_blank','title'=>'Отчёт за день')); ?></li>
<li><?php echo CHtml::Link('Сформировать отчёт по курьерам за день', array('/reports/cour'), array('target'=>'_blank','title'=>'Отчёт за день')); ?></li>

</ul>
</h3>

