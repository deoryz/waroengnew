<?php
$this->breadcrumbs=array(
	'Prices',
);

$this->menu=array(
	array('label'=>'Add Price', 'icon'=>'th-list','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Detail Price', 'icon'=>'th-list','url'=>array('list', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Prices</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'price-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'id_package',
		'name',
		'type',
		// 'from',
		// 'to',
		'price',
		'room',
		'night',
		'priority',
		/*
		'price_mask',
		'room',
		'night',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/price/delete", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/price/update", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
		),
	),
)); ?>
