<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
//		'id',
		'date',
		'number',
		array('name'=>'tbl_provider_id','header'=>'Поставщик','value'=>'Provider::model()->findbypk($data->tbl_provider_id)->name'),
		array('name'=>'id','header'=>'Сумма','value'=>'Invoice::calccost($data->id)'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}{update}',
		),
	),
)); ?>
