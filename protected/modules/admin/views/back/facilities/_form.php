<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'facilities-form',
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
	<?php if ($model->scenario == 'update' && $model->pdf!=''): ?>
	<?php echo $form->fileFieldRow($model,'pdf',array('hint'=>CHtml::link($model->pdf,Yii::app()->baseUrl.'/upload/pdf/'.$model->pdf, array('target'=>'_blank')))) ?>
	<?php else: ?>
	<?php echo $form->fileFieldRow($model,'pdf') ?>
	<?php endif ?>
	
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>array(
	        array('label'=>'English', 'content'=>
	        $form->textFieldRow($model,'title_en',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($model,'desc_en',array('class'=>'span8','rows'=>6, 'cols'=>50,)).
	        $form->textAreaRow($model,'facilities_en',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))
	        , 'active'=>true),
	        array('label'=>'Indonesia', 'content'=>
	        $form->textFieldRow($model,'title_id',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($model,'desc_id',array('class'=>'span8','rows'=>6, 'cols'=>50,)).
	        $form->textAreaRow($model,'facilities_id',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))
			),
	        array('label'=>'Japanese', 'content'=>
	        $form->textFieldRow($model,'title_ja',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($model,'desc_ja',array('class'=>'span8','rows'=>6, 'cols'=>50,)).
	        $form->textAreaRow($model,'facilities_ja',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))
			),
	        array('label'=>'Chinese', 'content'=>
	        $form->textFieldRow($model,'title_zn_ch',array('class'=>'span5','maxlength'=>100)).
	        $form->textAreaRow($model,'desc_zn_ch',array('class'=>'span8','rows'=>6, 'cols'=>50,)).
	        $form->textAreaRow($model,'facilities_zn_ch',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))
			),
	    ),
	)); ?>

<?php if ($model->scenario == 'update'): ?>
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = (obj.contentWindow.document.body.scrollHeight*1+50) + 'px';
  }
</script>
<iframe onload='javascript:resizeIframe(this);' width="100%" frameborder="no" src="<?php echo CHtml::normalizeUrl(array('/admin/facilitiesFoto/index', 'facilities'=>$model->id, 'iframe'=>'yes')) ?>"></iframe>
<?php endif ?>

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
