<?php
$this->breadcrumbs=array(
	Client::model()->findByPk($_GET[$this->varGet])->name=>array('/admin/client/index'),
	'Client Dets'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Add',
);

$this->menu=array(
	array('label'=>'List ClientDet', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Add <?php echo Client::model()->findByPk($_GET[$this->varGet])->name ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>