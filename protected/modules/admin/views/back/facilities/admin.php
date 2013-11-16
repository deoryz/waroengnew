<?php
$this->breadcrumbs=array(
	'Facilities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Facilities','url'=>array('index')),
	array('label'=>'Add Facilities','url'=>array('create')),
);
?>

<h1>Manage Facilities</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'facilities-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title_en',
		'desc_en',
		'facilities_en',
		'title_id',
		'desc_id',
		/*
		'facilities_id',
		'title_ja',
		'desc_ja',
		'facilities_ja',
		'title_zn_ch',
		'desc_zn_ch',
		'facilities_zn_ch',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
