<?php
$this->breadcrumbs=array(
	'Facilities'=>array('/admin/page/update', 'id'=>4),
	'Facilities Item'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Facilities', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Facilities', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Facilities', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Facilities <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>