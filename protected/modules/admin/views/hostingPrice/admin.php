<?php
$this->breadcrumbs=array(
	'Hosting Prices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HostingPrice','url'=>array('index')),
	array('label'=>'Add HostingPrice','url'=>array('create')),
);
?>

<h1>Manage Hosting Prices</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hosting-price-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'di',
		'hosting_id',
		'name',
		'periode',
		'price',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
