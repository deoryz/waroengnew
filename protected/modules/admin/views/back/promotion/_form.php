<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'promotion-form',
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

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'price',array('prepend'=>'IDR','class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'for',array('class'=>'span1', 'append'=>'People(s)')); ?>

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

	<div class="control-group ">
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

	<?php echo $form->fileFieldRow($model,'image',
	array('hint'=>'<b>Note:</b> Ukuran gambar adalah 174 x 121px. Gambar yang lebih besar akan terpotong otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/promo/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif ?>

	<?php echo $form->dropDownListRow($model,'active',array(
	'y'=>'Actived',
	'n'=>'Deactived',
	)); ?>

	<?php echo $form->dropDownListRow($model,'main',array(
	'0'=>'Deactived',
	'1'=>'Actived',
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
	    'tabs'=>array(
	        array('label'=>'English', 'content'=>
	        $form->textAreaRow($model,'desc_en',array('class'=>'span8','rows'=>6, 'cols'=>50,))
	        , 'active'=>true),
	        array('label'=>'Indonesia', 'content'=>
	        $form->textAreaRow($model,'desc_id',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	        array('label'=>'Japanese', 'content'=>
	        $form->textAreaRow($model,'desc_ja',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	        array('label'=>'Chinese', 'content'=>
	        $form->textAreaRow($model,'desc_zn_ch',array('class'=>'span8','rows'=>6, 'cols'=>50,))
			),
	    ),
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
