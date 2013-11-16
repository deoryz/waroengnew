<?php
/* @var $this MainController */

$this->breadcrumbs=array(
	Yii::t('main','Reservation (Step 1)'),
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper(Yii::t('main','Reservation (Step 1)'));
} else {
$this->pageName = (Yii::t('main','Reservation (Step 1)'));
}
// $this->pagePic = 'page-1.jpg';
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancy',
));
$this->pageTitle = Yii::t('main','Reservation (Step 1)').' - '.$this->pageTitle;
?>

	<?php if (Yii::app()->user->hasFlash('success')): ?>
				<h3 class="font-normal"><?php echo Yii::t('main','Reservation Success') ?></h3>
	<?php else: ?>
				<h3 class="font-normal"><?php echo Yii::t('main','Make Your Reservation. <span>(Step 1)') ?></h3>
	<?php endif ?>
	<hr/>
				<div class="height-10"></div>
				
				
<div class="form-inner">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'action'=>array('/main/reservation1'),
	    'id'=>'reservation-form',
	    'enableAjaxValidation'=>false,
	    'enableClientValidation'=>false,
	    // 'focus'=>array($this->model,'from'),
	    'clientOptions'=>array(
			'inputContainer'=>'.form-inner .row-form-inner',
		),
	)); ?>
	<div class="height-10"></div>
	<?php if (Yii::app()->user->hasFlash('success')): ?>
		<div class="success">
		<p><?php echo Yii::app()->user->getFlash('success') ?></p>
		</div>
	<?php else: ?>
		
	<div class="row-form-inner">
	<?php echo $form->errorSummary($model); ?>
		<?php echo $form->labelEx($model,'date_add'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php
				    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'id'=>'reservation',
				    // 'name'=>'Reservation[date_add]',
				    'model'=>$model,
				    'attribute'=>'date_add',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				    	'showAnim'=>'fold',
				    	'showOn'=> "button",
						'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
						'buttonImageOnly'=> true,
				    ),
				    'htmlOptions'=>array(
				    'style'=>'height:20px; width: 180px;'
				    ),
				    ));
				?>
				<?php // echo $form->textField($this->model,'from'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'date_add'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php
				    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'id'=>'reservation2',
				    // 'name'=>'Reservation[date_add]',
				    'model'=>$model,
				    'attribute'=>'date_end',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
					    'showAnim'=>'fold',
				    	'showOn'=> "button",
						'buttonImage'=> Yii::app()->baseUrl."/asset/images/icon-calender.png",
						'buttonImageOnly'=> true,
				    ),
				    'htmlOptions'=>array(
				    'style'=>'height:20px; width: 180px;'
				    ),
				    ));
				?>
				<?php // echo $form->textField($this->model,'to'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'date_end'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'adults'); ?>
		<div class="input-box-vsmall">
			<div class="inner-box">
				<?php echo $form->dropDownList($model,'adults',array(
				'1'=>'1',
				'2'=>'2',
				'3'=>'3',
				'4'=>'4',
				'5'=>'5',
				'6'=>'6',
				'7'=>'7',
				'8'=>'8',
				'9'=>'9',
				)); ?>
			</div>
	    </div>
	    <span class="less"> <?php echo Yii::t('main','person(s)') ?></span>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'adults'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<div class="button-book-now">
			<div class="inner-box">
				<input type="submit" name="submit" value=" " />
			</div>
	    </div>
	    <div class="clear"></div>
	</div>
	<?php endif ?>

	<div class="height-15"></div>
	<?php $this->endWidget(); ?>
</div>
				
				
				<div class="height-20"></div>
				