<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reservation', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Reservation', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Reservation', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Reservation', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Reservation #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_member',
		'date_add',
		'date_end',
		'adults',
		'children',
		'room',
		'id_pack',
		'status',
		'date_input',
	),
)); ?>
