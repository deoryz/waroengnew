<?php
$this->breadcrumbs=array(
	'Facilities Fotos'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FacilitiesFoto','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add FacilitiesFoto','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Facilities Fotos</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'facilities-foto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_facilities',
		'image',
		'active',
		'main',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
