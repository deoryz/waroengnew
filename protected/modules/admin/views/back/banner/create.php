<?php
$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Banner', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Banner</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>