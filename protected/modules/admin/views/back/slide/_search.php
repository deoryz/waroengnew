<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'title_id',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'title_en',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'title_ja',array('class'=>'span5','maxlength'=>225)); ?>

	<?php echo $form->textFieldRow($model,'title_zn_ch',array('class'=>'span5','maxlength'=>225)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
