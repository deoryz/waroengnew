<?php
$this->breadcrumbs=array(
	'Slides',
);

$this->menu=array(
	array('label'=>'Add Slide', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Slides</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name'=>'image',
			'filter'=>false,
			'type'=>'image',
			'value'=>'Yii::app()->baseUrl.ImageHelper::thumb(100,100, \'/images/slide/\'.$data->image, array(\'method\' => \'resize\', \'quality\' => \'90\'))',
		),
		'title_id',
		'title_en',
		'title_ja',
		'title_zn_ch',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
