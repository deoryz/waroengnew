<?php
$this->breadcrumbs=array(
	'Hostings'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Hosting', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Hosting</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>