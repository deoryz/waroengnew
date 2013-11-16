<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Member', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Member', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Member', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Member <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>