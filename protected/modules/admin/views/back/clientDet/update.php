<?php
$this->breadcrumbs=array(
	Client::model()->findByPk($_GET[$this->varGet])->name=>array('/admin/client/index'),
	'Client Dets'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	// $model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientDet', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
	array('label'=>'Create ClientDet', 'icon'=>'plus-sign','url'=>array('create', $this->varGet=>$_GET[$this->varGet])),
	// array('label'=>'View ClientDet', 'icon'=>'pencil','url'=>array('view','id'=>$model->id, $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Update <?php echo Client::model()->findByPk($_GET[$this->varGet])->name ?> &gt; <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>