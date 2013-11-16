<?php
$this->breadcrumbs=array(
	'Package Fotos'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PackageFoto', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create PackageFoto', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Update PackageFoto', 'icon'=>'pencil','url'=>array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Delete PackageFoto', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PackageFoto #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_package',
		'image',
		'active',
		'sort',
		'main',
	),
)); ?>
