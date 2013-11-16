<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slide-form',
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
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 738 x 373px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/slide/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>
	
<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>array(
	        array('label'=>'English', 'content'=>
	        $form->textFieldRow($model,'title_en',array('class'=>'span5','maxlength'=>100))
	        , 'active'=>true),
	        array('label'=>'Indonesia', 'content'=>
	        $form->textFieldRow($model,'title_id',array('class'=>'span5','maxlength'=>100))
			),
	        array('label'=>'Japanese', 'content'=>
	        $form->textFieldRow($model,'title_ja',array('class'=>'span5','maxlength'=>100))
			),
	        array('label'=>'Chinese', 'content'=>
	        $form->textFieldRow($model,'title_zn_ch',array('class'=>'span5','maxlength'=>100))
			),
	    ),
	)); ?>

	<?php //echo $form->textFieldRow($model,'title_id',array('class'=>'span5','maxlength'=>225)); ?>

	<?php //echo $form->textFieldRow($model,'title_en',array('class'=>'span5','maxlength'=>225)); ?>

	<?php //echo $form->textFieldRow($model,'title_ja',array('class'=>'span5','maxlength'=>225)); ?>

	<?php //echo $form->textFieldRow($model,'title_zn_ch',array('class'=>'span5','maxlength'=>225)); ?>

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
