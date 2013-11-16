<?php
$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
	// array('label'=>'Add Member', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Members</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'member-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'name',
		'address',
		'telp',
		'email',
		// 'credit_card',
		
		// 'expiration',
		// 'verification',
		// 'pass',
		
		// array(
			// 'class'=>'bootstrap.widgets.TbButtonColumn',
			// 'template'=>'{update} {delete}'
		// ),
	),
)); ?>
