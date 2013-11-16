<?php
$this->breadcrumbs=array(
	'Facilities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Facilities', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Facilities', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Facilities', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Facilities', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Facilities #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_en',
		'desc_en',
		'facilities_en',
		'title_id',
		'desc_id',
		'facilities_id',
		'title_ja',
		'desc_ja',
		'facilities_ja',
		'title_zn_ch',
		'desc_zn_ch',
		'facilities_zn_ch',
	),
)); ?>
