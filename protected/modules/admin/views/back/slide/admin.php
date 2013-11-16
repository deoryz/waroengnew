<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Slide','url'=>array('index')),
	array('label'=>'Add Slide','url'=>array('create')),
);
?>

<h1>Manage Slides</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		'title_id',
		'title_en',
		'title_ja',
		'title_zn_ch',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
