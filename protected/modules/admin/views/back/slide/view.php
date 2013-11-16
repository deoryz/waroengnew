<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Slide', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Slide', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Slide', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Slide', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Slide #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'title_id',
		'title_en',
		'title_ja',
		'title_zn_ch',
	),
)); ?>
