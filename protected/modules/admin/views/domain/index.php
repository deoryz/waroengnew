<?php
$this->breadcrumbs=array(
	'Domains',
);

$this->menu=array(
	array('label'=>'Add Domain', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Domains</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'domain-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'tld',
		'price',
		'mask',
		// 'jenis',
		array(
			'name'=>'jenis',
			'filter'=>array(
				'int'=>'International',
				'id'=>'Indonesia',
			),
			'value'=>'($data->jenis=="int")? "International":"Indonesia"',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
