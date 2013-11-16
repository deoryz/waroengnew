<?php
$this->breadcrumbs=array(
	'Hostings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hosting','url'=>array('index')),
	array('label'=>'Add Hosting','url'=>array('create')),
);
?>

<h1>Manage Hostings</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hosting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'group',
		'paket_name',
		'name',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
