<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Promotion','url'=>array('index')),
	array('label'=>'Add Promotion','url'=>array('create')),
);
?>

<h1>Manage Promotions</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promotion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'price',
		'for',
		'from',
		'to',
		/*
		'desc_en',
		'desc_id',
		'desc_ja',
		'desc_zn_ch',
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
