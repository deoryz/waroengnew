<?php
$this->breadcrumbs=array(
	Client::model()->findByPk($_GET[$this->varGet])->name=>array('/admin/client/index'),
	'Client Dets',
);

$this->menu=array(
	array('label'=>'Add ClientDet', 'icon'=>'th-list','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1><?php echo Client::model()->findByPk($_GET[$this->varGet])->name ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'client-det-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'id_client',
		'name',
		'job',
		'url',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/clientDet/delete", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/clientDet/update", array("id" => $data->id, "'.$this->varGet.'" => $data->'.$this->varFk.'))',
		),
	),
)); ?>
