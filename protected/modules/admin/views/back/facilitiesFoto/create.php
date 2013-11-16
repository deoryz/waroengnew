<?php
$this->breadcrumbs=array(
	'Facilities Fotos'=>array('index', $this->varGet=>$_GET[$this->varGet]),
	'Add',
);

$this->menu=array(
	array('label'=>'List Facilities Foto', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);
?>

<h1>Add Facilities Foto</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>