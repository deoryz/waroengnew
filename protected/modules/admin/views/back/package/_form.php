<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'package-form',
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

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'qty',array('append'=>'Room(s)','class'=>'span1')); ?>

	<?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ','class'=>'span3')); ?>

	<?php echo $form->radioButtonListRow($model,'price_type',array(
	'0'=>'Nett',
	'1'=>'++',
	)); ?>

	<?php echo $form->textFieldRow($model,'max',array('append'=>'Persons(s)','class'=>'span1')); ?>

	<?php echo $form->dropDownListRow($model,'no_smoking',array(
	'0'=>'Allowed to smoke',
	'1'=>'No Smoking',
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>array(
	        array('label'=>'English', 'content'=>
	        $form->textAreaRow($model,'description_en',array('class'=>'span5')).
	        $form->textAreaRow($model,'features_en',array('rows'=>6, 'cols'=>50, 'class'=>'span8')).
	        $form->textFieldRow($model,'caption_en',array('class'=>'span5','maxlength'=>200,'hint'=>'Akan muncul di bawah harga, sebagai keterangan tambahan, ex: sudah termasuk breakfast'))
	        , 'active'=>true),
	        array('label'=>'Indonesia', 'content'=>
	        $form->textAreaRow($model,'description_id',array('class'=>'span5')).
	        $form->textAreaRow($model,'features_id',array('rows'=>6, 'cols'=>50, 'class'=>'span8')).
	        $form->textFieldRow($model,'caption_id',array('class'=>'span5','maxlength'=>200,'hint'=>'Akan muncul di bawah harga, sebagai keterangan tambahan, ex: sudah termasuk breakfast'))
			),
	        array('label'=>'Japanese', 'content'=>
	        $form->textAreaRow($model,'description_ja',array('class'=>'span5')).
	        $form->textAreaRow($model,'features_ja',array('rows'=>6, 'cols'=>50, 'class'=>'span8')).
	        $form->textFieldRow($model,'caption_ja',array('class'=>'span5','maxlength'=>200,'hint'=>'Akan muncul di bawah harga, sebagai keterangan tambahan, ex: sudah termasuk breakfast'))
			),
	        array('label'=>'Chinese', 'content'=>
	        $form->textAreaRow($model,'description_zn_ch',array('class'=>'span5')).
	        $form->textAreaRow($model,'features_zn_ch',array('rows'=>6, 'cols'=>50, 'class'=>'span8')).
	        $form->textFieldRow($model,'caption_zn_ch',array('class'=>'span5','maxlength'=>200,'hint'=>'Akan muncul di bawah harga, sebagai keterangan tambahan, ex: sudah termasuk breakfast'))
			),
	    ),
	)); ?>
<?php if ($model->scenario == 'update'): ?>
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = (obj.contentWindow.document.body.scrollHeight*1+50) + 'px';
  }
</script>
<iframe onload='javascript:resizeIframe(this);' width="100%" frameborder="no" src="<?php echo CHtml::normalizeUrl(array('/admin/packageFoto/index', 'package'=>$model->id, 'iframe'=>'yes')) ?>"></iframe>

<iframe onload='javascript:resizeIframe(this);' width="100%" frameborder="no" src="<?php echo CHtml::normalizeUrl(array('/admin/price/index', 'package'=>$model->id, 'iframe'=>'yes')) ?>"></iframe>
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
