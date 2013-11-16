<?php
$this->breadcrumbs=array(
	'Package Fotos'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PackageFoto','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add PackageFoto','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Package Fotos</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'package-foto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_package',
		'image',
		'active',
		'sort',
		'main',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
