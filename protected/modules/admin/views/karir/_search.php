<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'posisi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_open',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_close',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_input',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_modif',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>