<?php
$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=>'Add Client', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Clients</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {update} {delete}',
			'viewButtonUrl'=>"CHtml::normalizeUrl(array('/admin/clientDet/index', 'client'=>\$data->id))",
		),
	),
)); ?>
