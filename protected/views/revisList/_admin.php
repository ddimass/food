<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'revis-list-grid',
	'dataProvider'=>$model->search(),
	'ajaxUpdate'=>true,
	'filter'=>$model,
	'columns'=>array(
//		'id',
		array('name'=>'tbl_ingred_id','value'=>'Ingred::model()->findbypk($data->tbl_ingred_id)->name'),
		'count',
		'cost',
		array('name'=>'cost','value'=>'$data->count*$data->cost'),
		array('name'=>'count_in','type'=>'raw', 'value'=>'$data->getField($data)'),
		'margin',
		/*
		'desc',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>