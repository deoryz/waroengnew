<?php
$this->breadcrumbs=array(
	'Booking List',
);

$this->menu=array(
	// array('label'=>'Add Reservation', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Booking List</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'reservation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		array(
			'name'=>'date_input',
			'header'=>'Date Input',
			'value'=>'date("d F Y",strtotime($data->date_input))',
		),
		array(
			'name'=>'id_member',
			'header'=>'Member Name',
			'type'=>'raw',
			'value'=>'CHtml::link($data->member->name,array("/admin/member/view", "id"=>$data->id_member))',
		),
		// 'id_member',
		array(
			'name'=>'date_add',
			'header'=>'Check In',
			'value'=>'date("d F Y",strtotime($data->date_add))',
		),
		// 'date_add',
		array(
			'name'=>'date_end',
			'header'=>'Check Out',
			'value'=>'date("d F Y",strtotime($data->date_end))',
		),
		// 'date_end',
		'adults',
		// 'children',
		array(
			'name'=>'id_pack',
			'header'=>'Pack Name',
			'value'=>'$data->pack->name',
		),
		'room',
		array(
			'name'=>'status',
			'type'=>'raw',
			'value'=>'Reservation::model()->checkStatus($data->status,$data->id);'
		),
		// 'id_pack',
		// 'status',
		// 'date_input',
		
		// array(
			// 'class'=>'bootstrap.widgets.TbButtonColumn',
			// 'template'=>'{update} {delete}'
		// ),
	),
)); ?>
