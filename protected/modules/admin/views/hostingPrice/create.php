<?php
$this->breadcrumbs=array(
	'Hosting Prices'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List HostingPrice', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add HostingPrice</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>