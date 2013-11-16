<?php
$this->breadcrumbs=array(
	'Room and Rates '=>array('/admin/page/update', 'id'=>3),
	'Room Packages'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Package', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Room Package</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>