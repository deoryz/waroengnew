<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Member', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Member', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Member', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Member', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Member #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'pass',
		'nama',
		'alamat',
		'kota',
		'no_telp',
		'status',
	),
)); ?>
