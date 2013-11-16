<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
	<?php echo CHtml::encode($data->title_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_en')); ?>:</b>
	<?php echo CHtml::encode($data->desc_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilities_en')); ?>:</b>
	<?php echo CHtml::encode($data->facilities_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_id')); ?>:</b>
	<?php echo CHtml::encode($data->title_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_id')); ?>:</b>
	<?php echo CHtml::encode($data->desc_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilities_id')); ?>:</b>
	<?php echo CHtml::encode($data->facilities_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ja')); ?>:</b>
	<?php echo CHtml::encode($data->title_ja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_ja')); ?>:</b>
	<?php echo CHtml::encode($data->desc_ja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilities_ja')); ?>:</b>
	<?php echo CHtml::encode($data->facilities_ja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_zn_ch')); ?>:</b>
	<?php echo CHtml::encode($data->title_zn_ch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_zn_ch')); ?>:</b>
	<?php echo CHtml::encode($data->desc_zn_ch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilities_zn_ch')); ?>:</b>
	<?php echo CHtml::encode($data->facilities_zn_ch); ?>
	<br />

	*/ ?>

</div>