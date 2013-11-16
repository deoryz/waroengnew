<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order','url'=>array('index')),
	array('label'=>'Add Order','url'=>array('create')),
);
?>

<h1>Manage Orders</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'keterangan',
		'biller_type',
		'biller_id',
		'update',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
