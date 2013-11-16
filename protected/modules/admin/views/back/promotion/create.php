<?php
$this->breadcrumbs=array(
	'Promotion'=>array('/admin/page/update', 'id'=>5),
	'Promotions List'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Promotion List', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Promotion List</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>