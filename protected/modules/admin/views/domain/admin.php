<?php
$this->breadcrumbs=array(
	'Domains'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Domain','url'=>array('index')),
	array('label'=>'Add Domain','url'=>array('create')),
);
?>

<h1>Manage Domains</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'domain-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tld',
		'price',
		'mask',
		'jenis',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
