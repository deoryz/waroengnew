<?php
$this->breadcrumbs=array(
	'Prices'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Price','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Add Price','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Manage Prices</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'price-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_package',
		'type',
		'from',
		'to',
		'price',
		/*
		'price_mask',
		'room',
		'night',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
