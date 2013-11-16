<?php
$this->breadcrumbs=array(
	'Client Dets'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientDet','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add ClientDet','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Client Dets</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'client-det-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_client',
		'url',
		'name',
		'job',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
