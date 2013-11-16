<?php
$this->breadcrumbs=array(
	Client::model()->findByPk($_GET[$this->varGet])->name=>array('/admin/client/index'),
	'Client Dets'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientDet', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create ClientDet', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Update ClientDet', 'icon'=>'pencil','url'=>array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Delete ClientDet', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View ClientDet #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_client',
		'url',
		'name',
		'job',
	),
)); ?>
