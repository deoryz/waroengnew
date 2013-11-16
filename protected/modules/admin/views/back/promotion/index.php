<?php
$this->breadcrumbs=array(
	'Promotion'=>array('/admin/page/update', 'id'=>5),
	'Promotions List',
);

$this->menu=array(
	array('label'=>'Add Promotion List', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Promotions List</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promotion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'name',
		'price',
		'for',
		array(
			'name'=>'from',
			'filter'=>false,
		),
		array(
			'name'=>'to',
			'filter'=>false,
		),
		// 'to',
		'desc_en',
		// 'desc_id',
		// 'desc_ja',
		// 'desc_zn_ch',
		array(
			'name'=>'active',
			'filter'=>array(
				'y'=>'Active',
				'n'=>'deactive',
			),
			'type'=>'raw',
			'value'=>'($data->active=="y")? "Active":"Deactive" ',
		),
		array(
			'name'=>'main',
			'filter'=>array(
				'1'=>'Active',
				'0'=>'deactive',
			),
			'type'=>'raw',
			'value'=>'($data->main=="1")? "Active":"Deactive" ',
		),
		// 'active',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
