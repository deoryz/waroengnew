<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
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

	<?php echo $form->dropDownListRow($model,'member_id',CHtml::listData(Member::model()->findAll(),'id','email')); ?>

	<?php echo $form->dropDownListRow($model,'jenis_produk',array(
		'Hosting'=>'Hosting',
		'Domain'=>'Domain',
	)); ?>

	<div class="product-hosting">
	
		<?php echo $form->dropDownListRow($modelHosting,'hosting_id',CHtml::listData(Hosting::model()->findAll(),'id','paket_name')); ?>

		<?php echo $form->textFieldRow($modelHosting,'domain',array('class'=>'span5','maxlength'=>100)) ?>

	</div>

	<div class="product-domain" style="display: none;">
	
		<?php echo $form->dropDownListRow($modelDomain,'domain_id',CHtml::listData(Domain::model()->findAll(),'id','tld')); ?>

		<?php echo $form->textFieldRow($modelDomain,'domain',array('class'=>'span5','maxlength'=>100)) ?>

	</div>

	<?php echo $form->textFieldRow($model,'periode',array('class'=>'span2','maxlength'=>100)) ?>

	<?php echo $form->textFieldRow($model,'start_date',array('class'=>'span5','maxlength'=>100)) ?>

	<?php echo $form->dropDownListRow($model,'status',array(
		'1' => 'Aktif',
		'0' => 'Tidak Aktif',
		'2' => 'Waktunya Perpanjangan',
		'3' => 'Suspend',
	)); ?>

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
<script type="text/javascript">
	$('#Order_jenis_produk').live('change', function() {
		if($(this).val()=='Hosting'){
			$('.product-hosting').show();
			$('.product-domain').hide();
		}else{
			$('.product-domain').show();
			$('.product-hosting').hide();
		}
	})
</script>