<?php
$this->breadcrumbs=array(
	'Fb Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FbPost','url'=>array('index')),
	array('label'=>'Add FbPost','url'=>array('create')),
);
?>

<h1>Manage Fb Posts</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'fb-post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category',
		'text',
		'link',
		'image',
		'date_input',
		/*
		'date_modif',
		'date_send',
		'interval',
		'jenis',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
