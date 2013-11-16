<?php
$this->breadcrumbs=array(
	'Facilities Fotos'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FacilitiesFoto', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create FacilitiesFoto', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Update FacilitiesFoto', 'icon'=>'pencil','url'=>array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Delete FacilitiesFoto', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View FacilitiesFoto #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_facilities',
		'image',
		'active',
		'main',
		'sort',
	),
)); ?>
