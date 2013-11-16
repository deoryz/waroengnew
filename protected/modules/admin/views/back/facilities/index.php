<?php
$this->breadcrumbs=array(
	'Facilities'=>array('/admin/page/update', 'id'=>4),
	'Facilities Item',
);

$this->menu=array(
	array('label'=>'Add Facilities', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Facilities</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'facilities-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'title_en',
		'desc_en',
		'facilities_en',
		// 'title_id',
		// 'desc_id',
		/*
		'facilities_id',
		'title_ja',
		'desc_ja',
		'facilities_ja',
		'title_zn_ch',
		'desc_zn_ch',
		'facilities_zn_ch',
		*/
		array(
			'header'=>'sort',
			'type'=>'raw',
			'value'=>'Facilities::model()->sortButton($data,"'.$this->id.'")',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
