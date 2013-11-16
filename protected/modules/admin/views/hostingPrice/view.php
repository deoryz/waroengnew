<?php
$this->breadcrumbs=array(
	'Hosting Prices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List HostingPrice', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add HostingPrice', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit HostingPrice', 'icon'=>'pencil','url'=>array('update','id'=>$model->di)),
	array('label'=>'Delete HostingPrice', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->di),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View HostingPrice #<?php echo $model->di; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'di',
		'hosting_id',
		'name',
		'periode',
		'price',
	),
)); ?>
