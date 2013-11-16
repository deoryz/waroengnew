<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'parent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'kode',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'modul_target',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_input',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_modif',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'hidden',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'modul',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
