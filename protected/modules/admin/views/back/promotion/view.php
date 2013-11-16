<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Promotion', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Promotion', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Promotion', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Promotion', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Promotion #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'for',
		'from',
		'to',
		'desc_en',
		'desc_id',
		'desc_ja',
		'desc_zn_ch',
		'active',
	),
)); ?>
