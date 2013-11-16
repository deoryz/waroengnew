<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'price-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php // echo $form->textFieldRow($model,'id_package',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'type',array(
		'date'=>'Periode',
		'week'=>'Repeatedly',
	),array(
		'onchange'=>'typeSelector($(this).val());'
	)); ?>
	<script type="text/javascript">
		function typeSelector(type){
			// var type = $(this).val();
			$('.type-selector').removeClass('active');
			$('#type-'+type).addClass('active');
		}
	</script>
	<style type="text/css">
		.type-selector{
			display: none;
		}
		.type-selector.active{
			display: block;
		}
	</style>
	<div class="type-selector <?php echo ($model->type=='date' OR $model->scenario=='insert')?'active':'' ?>" id="type-date">
	<div class="control-group ">
		<?php echo $form->labelEx($model,'from', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$model,
			    'attribute'=>'from',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			    'showAnim'=>'fold',
			    ),
			    'htmlOptions'=>array(
			    'style'=>'height:20px;'
			    ),
			    ));
			?>
			<?php echo $form->error($model,'from'); ?>
		</div>
	</div>    

	<div class="control-group">
		<?php echo $form->labelEx($model,'to', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php
			    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$model,
			    'attribute'=>'to',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			    'showAnim'=>'fold',
			    ),
			    'htmlOptions'=>array(
			    'style'=>'height:20px;'
			    ),
			    ));
			?>
			<?php echo $form->error($model,'to'); ?>
		</div>
	</div>

	</div>
	<div class="type-selector <?php echo ($model->type=='week')?'active':'' ?>" id="type-week">
	<?php echo $form->checkBoxListInlineRow($model,'week',array(
		'1'=>'Senin',
		'2'=>'Selasa',
		'3'=>'Rabu',
		'4'=>'Kamis',
		'5'=>'Jumat',
		'6'=>'Sabtu',
		'7'=>'Minggu',
	)); ?>
	</div>
	
	<?php echo $form->textFieldRow($model,'price',array('class'=>'span2','prepend'=>'Rp.')); ?>

	<?php echo $form->textFieldRow($model,'price_mask',array('class'=>'span2','prepend'=>'Rp.')); ?>

	<?php echo $form->textFieldRow($model,'priority',array('class'=>'span1')); ?>

<h3>Rule</h3>
	<?php echo $form->textFieldRow($model,'room',array('class'=>'span1','append'=>'Room(s)')); ?>

	<?php echo $form->textFieldRow($model,'night',array('class'=>'span1','append'=>'Night(s)')); ?>

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
