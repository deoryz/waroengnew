<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fb-post-form',
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

	<?php echo $form->dropDownListRow($model,'category',array(
		'Joke'=>'Joke',
		'Tebakan'=>'Tebakan',
		'Berita'=>'Berita',
		'Informasi'=>'Informasi',
		'Teknologi'=>'Teknologi',
		'Tips'=>'Tips',
		'Motivasi'=>'Motivasi',
		'Review Film'=>'Review Film',
		'Meme'=>'Meme',
		'Otomotif'=>'Otomotif',
		'Game'=>'Game',
	),array('maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'text',array('rows'=>15, 'cols'=>30, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'link',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'referensi',array('class'=>'span5','maxlength'=>300)); ?>

	<?php if ($model->scenario == 'update' AND $model->image != ''): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/fbpost/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>
	<?php echo $form->fileFieldRow($model,'image'); ?>

	<?php echo $form->dropDownListRow($model,'jenis',array(
		'2'=>'Send But Delay',
		'0'=>'Interval',
		'1'=>'Kirim Sekarang',
	),array('maxlength'=>200)); ?>
	<?php
	// SELECT SUM(`interval`) as `interval`  FROM `fb_post` WHERE `status` = 0
	$query = Yii::app()->db->createCommand("
	SELECT SUM(`interval`) as `interval`  FROM `fb_post` WHERE `status` = 0
	")->queryRow();
	$menit = $query['interval'];
	?>
	<?php echo $form->dropDownListRow($model,'interval',array(
		'10'=>'10 Menit',
		'15'=>'15 Menit',
		'20'=>'20 Menit',
		'30'=>'30 Menit',
		'45'=>'45 Menit',
		'60'=>'1 Jam',
		'5'=>'5 Menit',
		'120'=>'2 Jam',
		'180'=>'3 Jam',
		'240'=>'4 Jam',
		'300'=>'5 Jam',
		'360'=>'6 Jam',
		'420'=>'7 Jam',
		'480'=>'8 Jam',
		'540'=>'9 Jam',
		'600'=>'10 Jam',
	),array('maxlength'=>200, 'hint'=>'setelah '.$menit.' menit baru di proses')); ?>


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
