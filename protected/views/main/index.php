<?php
/* @var $this MainController */

$this->breadcrumbs=array(
	'Main',
);

$this->pageTitle = $this->pageTitle;
?>
<div class="row">
	<div class="span6">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array( 
	    'id'=>'member-form', 
	    'type'=>'horizontal', 
	    'enableAjaxValidation'=>true, 
	    'clientOptions'=>array( 
	        'validateOnSubmit'=>true, 
	    ), 
	)); ?>
<h2>Daftar Sekarang!!!</h2>
	    <?php echo $form->errorSummary($model); ?>
	    <?php if(Yii::app()->user->hasFlash('success')): ?> 
	     
	        <?php $this->widget('bootstrap.widgets.TbAlert', array( 
	            'alerts'=>array('success'), 
	        )); ?> 
	     
	    <?php endif; ?> 

	    <?php echo $form->textFieldRow($model,'nama',array('class'=>'span3','maxlength'=>100)); ?>

	    <?php echo $form->textFieldRow($model,'no_hp',array('class'=>'span3','maxlength'=>20)); ?>

	    <?php echo $form->textFieldRow($model,'jenis_kelamin',array('class'=>'span3')); ?>

	    <?php echo $form->textFieldRow($model,'tanggal_lahir',array('class'=>'span3')); ?>

	    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3','maxlength'=>100)); ?>

	    <?php echo $form->passwordFieldRow($model,'pass',array('class'=>'span3','maxlength'=>100)); ?>

	        <?php $this->widget('bootstrap.widgets.TbButton', array( 
	            'buttonType'=>'submit', 
	            'type'=>'primary', 
	            'label'=>$model->isNewRecord ? 'Daftar Sekarang' : 'Save', 
	        )); ?>

	<?php $this->endWidget(); ?>
	</div>
	<div class="span6">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array( 
	    'id'=>'login-form', 
	    'type'=>'horizontal', 
	    'enableAjaxValidation'=>true, 
	    'clientOptions'=>array( 
	        'validateOnSubmit'=>true, 
	    ), 
	)); ?>
<h2>Login</h2>
	    <?php echo $form->errorSummary($login); ?>
	    <?php if(Yii::app()->user->hasFlash('success')): ?> 
	     
	        <?php $this->widget('bootstrap.widgets.TbAlert', array( 
	            'alerts'=>array('success'), 
	        )); ?> 
	     
	    <?php endif; ?> 

	    <?php echo $form->textFieldRow($login,'email',array('class'=>'span3','maxlength'=>100)); ?>

	    <?php echo $form->passwordFieldRow($login,'pass',array('class'=>'span3','maxlength'=>100)); ?>

	        <?php $this->widget('bootstrap.widgets.TbButton', array( 
	            'buttonType'=>'submit', 
	            'type'=>'primary', 
	            'label'=>$login->isNewRecord ? 'Login' : 'Save', 
	        )); ?>

	<?php $this->endWidget(); ?>
	</div>
</div>