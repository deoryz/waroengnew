<?php
$this->breadcrumbs=array(
	'Facilities'=>array('/admin/page/update', 'id'=>4),
	'Facilities Item'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Facilities', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Facilities</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>