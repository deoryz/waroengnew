<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'facilities-foto-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 300 x 280px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/facilities/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>

	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>

	<?php echo $form->dropDownListRow($model, 'main', array(
		'0'=>'Deactive',
		'1'=>'Active',
	)); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index', $this->varGet=>$_GET[$this->varGet])),
			'label'=>'Batal',
		)); ?>

<?php $this->endWidget(); ?>
