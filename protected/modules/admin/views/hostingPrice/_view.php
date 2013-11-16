<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('di')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->di),array('view','id'=>$data->di)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hosting_id')); ?>:</b>
	<?php echo CHtml::encode($data->hosting_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode')); ?>:</b>
	<?php echo CHtml::encode($data->periode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>