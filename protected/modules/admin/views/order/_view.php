<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biller_type')); ?>:</b>
	<?php echo CHtml::encode($data->biller_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biller_id')); ?>:</b>
	<?php echo CHtml::encode($data->biller_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update')); ?>:</b>
	<?php echo CHtml::encode($data->update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>