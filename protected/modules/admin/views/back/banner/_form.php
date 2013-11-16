<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'banner-form',
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

	<?php //echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>225)); ?>
	<?php if ($model->content_image == '1'): ?>
		
	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 86 x 71px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/banner/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>
	<?php endif ?>
	<?php //echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>225)); ?>

<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>array(
	        array('label'=>'English', 'content'=>
	        $form->textAreaRow($model,'content_en',array('class'=>'span8','rows'=>6, 'cols'=>50,))
	        , 'active'=>true),
	        array('label'=>'Indonesia', 'content'=>
	        $form->textAreaRow($model,'content_id',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	        array('label'=>'Japanese', 'content'=>
	        $form->textAreaRow($model,'content_ja',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	        array('label'=>'Chinese', 'content'=>
	        $form->textAreaRow($model,'content_zn_ch',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	    ),
	)); ?>
	
	<?php //echo $form->textAreaRow($model,'content_en',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'content_id',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'content_ja',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'content_zn_ch',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
