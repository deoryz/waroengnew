<?php
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Banner', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Banner', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Banner', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Banner', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Banner #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'image',
		'content_en',
		'content_id',
		'content_ja',
		'content_zn_ch',
	),
)); ?>
