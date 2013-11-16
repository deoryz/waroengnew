<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tld')); ?>:</b>
	<?php echo CHtml::encode($data->tld); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mask')); ?>:</b>
	<?php echo CHtml::encode($data->mask); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />


</div>