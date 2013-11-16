<?php
$this->breadcrumbs=array(
	'Hostings',
);

$this->menu=array(
	array('label'=>'Add Hosting', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Hostings</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hosting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'group',
		'paket_name',
		'name',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
