<?php
$this->breadcrumbs=array(
	'Room and Rates '=>array('/admin/page/update', 'id'=>2),
	'Room Packages',
);

$this->menu=array(
	array('label'=>'Add Package', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Room Packages</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'package-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'name',
		'qty',
		array(
			'name'=>'price',
			'type'=>'raw',
			'value'=>'$data->price." ".Package::model()->getPriceType($data->price_type)'
		),
		// 'price',
		'max',
		// 'description',
		// 'features',
		array(
			'name'=>'no_smoking',
			'filter'=>array(
				'0'=>'Allow to Smoke',
				'1'=>'No Smoking',
			),
			'type'=>'raw',
			'value'=>'Package::model()->getNoSmoking($data->no_smoking)',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
