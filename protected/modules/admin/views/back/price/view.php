<?php
$this->breadcrumbs=array(
	'Prices'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Price', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create Price', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Update Price', 'icon'=>'pencil','url'=>array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Delete Price', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Price #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_package',
		'type',
		'from',
		'to',
		'price',
		'price_mask',
		'room',
		'night',
	),
)); ?>
