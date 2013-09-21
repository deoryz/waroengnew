<?php
$this->breadcrumbs=array(
	'Fb Posts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FbPost', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add FbPost', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit FbPost', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete FbPost', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View FbPost #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		'text',
		'link',
		'image',
		'date_input',
		'date_modif',
		'date_send',
		'interval',
		'jenis',
	),
)); ?>
