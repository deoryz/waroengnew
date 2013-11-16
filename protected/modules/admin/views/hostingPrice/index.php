<?php
$this->breadcrumbs=array(
	'Hosting Prices',
);

$this->menu=array(
	array('label'=>'Add HostingPrice', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Hosting Prices</h1>
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
			'template'=>'{update} {delete}'
		),
	),
)); ?>
