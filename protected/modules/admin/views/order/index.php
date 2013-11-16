<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Add Order', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Orders</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'keterangan',
		'jenis_produk',
		'update',
		// 'status',
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Order::model()->getStatus($data->status)',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
