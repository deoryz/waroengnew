<?php
$this->breadcrumbs=array(
	'Hostings'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Hosting', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Hosting', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Hosting', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Hosting <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array(
	'model'=>$model,
	'modelPrice'=>$modelPrice,
)); ?>