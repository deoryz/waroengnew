<?php
$this->breadcrumbs=array(
	'Domains'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Domain', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Domain</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>