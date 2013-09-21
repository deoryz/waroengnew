<?php
$this->breadcrumbs=array(
	'Fb Posts',
);

$this->menu=array(
	array('label'=>'Add FbPost', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Fb Posts</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'fb-post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'category',
		array(
			'name'=>'text',
			'type'=>'raw',
			'value'=>'substr($data->text,0,100)',
		),
		'link',
		'image',
		'date_send',
		'interval',
		/*
		'date_input',
		'date_modif',
		'jenis',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
