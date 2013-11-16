<?php
$this->breadcrumbs=array(
	'Promotion'=>array('/admin/page/update', 'id'=>5),
	'Promotions List'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Promotion List', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Promotion List', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Promotion', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Promotion List <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>