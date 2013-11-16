<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Order', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Order', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Order', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keterangan',
		'biller_type',
		'biller_id',
		'update',
		'status',
	),
)); ?>
