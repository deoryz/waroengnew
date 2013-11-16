<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'member-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'kota',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_telp',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($model,'status',array(
		'0'=>'Tidak Aktif',
		'1'=>'Aktif',
	),array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
