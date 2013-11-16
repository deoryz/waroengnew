<?php
$this->breadcrumbs=array(
	'Hosting Prices'=>array('index'),
	// $model->name=>array('view','id'=>$model->di),
	'Edit',
);

$this->menu=array(
	array('label'=>'List HostingPrice', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add HostingPrice', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View HostingPrice', 'icon'=>'pencil','url'=>array('view','id'=>$model->di)),
);
?>

<h1>Edit HostingPrice <?php echo $model->di; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>