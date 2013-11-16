<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Reservation','url'=>array('index')),
	array('label'=>'Add Reservation','url'=>array('create')),
);
?>

<h1>Manage Reservations</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'reservation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_member',
		'date_add',
		'date_end',
		'adults',
		'children',
		/*
		'room',
		'id_pack',
		'status',
		'date_input',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
