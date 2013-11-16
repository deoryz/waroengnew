<?php
$this->breadcrumbs=array(
	'Hostings'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Hosting', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Hosting', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Hosting', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Hosting', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Hosting #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group',
		'paket_name',
		'name',
		'status',
	),
)); ?>
