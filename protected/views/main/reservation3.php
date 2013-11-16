<?php
/* @var $this MainController */

$this->breadcrumbs=array(
	Yii::t('main','Reservation (Step 3)'),
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper(Yii::t('main','Reservation (Step 3)'));
} else {
$this->pageName = (Yii::t('main','Reservation (Step 3)'));
}
// $this->pagePic = 'page-1.jpg';
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancy',
));
$bulan = array();
for ($i=1; $i <=12 ; $i++) { 
	$bulan[substr('00'.$i,-2)]=substr('00'.$i,-2);
}
$tahun = array();
for ($i=date("Y"); $i <=date("Y")+15 ; $i++) { 
	$tahun[$i]=$i;
}
$this->pageTitle = Yii::t('main','Reservation (Step 3)').' - '.$this->pageTitle;
?>

				<h3 class="font-normal"><?php echo Yii::t('main','Make Your Reservation. <span>(Step 3)</span>') ?></h3>
				<hr/>
				<div style="margin-bottom: -10px;"></div>
<?php /*
<dl class="dl-horizontal">
	<?php
	$label = Reservation::attributeLabels();
	?>
	<dt><?php 	echo  $label['date_add']	?></dt>
	<dd><?php echo date('d F Y',strtotime($session['reservation']['date_add'])); ?></dd>
	<dt><?php 	echo  $label['date_end']	?></dt>
	<dd><?php echo date('d F Y',strtotime($session['reservation']['date_end'])); ?></dd>
	<dt><?php 	echo  $label['adults']	?></dt>
	<dd><?php echo $session['reservation']['adults']; ?></dd>
	<dt><?php 	echo  $label['room']	?></dt>
	<dd><?php echo $session['reservation']['room']; ?> Room(s)</dd>
	<dt><?php 	echo  $label['id_pack']	?></dt>
	<dd><?php echo Package::model()->findByPk($session['reservation']['id_pack'])->name; ?></dd>
</dl>
*/ ?>				
<div class="rooms">
	<?php
	$package = Package::model()->findByPk($session['reservation']['id_pack']);
	?>
	<div class="rooms-pic">
		<p class="margin-bottom-5">
			<img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(174,200,'/images/room/'.$package['foto']['image'],array('method'=>'resize','quality'=>'90')) ?>">
		</p>
	</div>
	<div class="rooms-content">
		<p>
		<h4 class="dark-blue"><?php echo $package->name; ?>
			<?php if ($package->no_smoking=='1'): ?>
			<i class="icon-non-smoking"></i>
			<?php endif ?>

		</h4>
			<div class="reservation-check">
				<div class="reservation-check-list no-border">
					<b class="red-blood">Rp <?php echo number_format($package->price,0,',','.'); ?> </b>
					<b class="red-blood"><?php echo Yii::t('main','/ room / night') ?></b>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list no-border">
					<div class="reservation-check-title"><b><?php echo Yii::t('main','Price Total') ?> </b></div>
					<div class="reservation-check-value" align="right"><b class="red-blood">Rp <?php echo number_format($package->price*$session['reservation']['room']*(gregoriantojd(date('m',strtotime($session['reservation']['date_end'])), date('d',strtotime($session['reservation']['date_end'])), date('Y',strtotime($session['reservation']['date_end'])))-gregoriantojd(date('m',strtotime($session['reservation']['date_add'])), date('d',strtotime($session['reservation']['date_add'])), date('Y',strtotime($session['reservation']['date_add'])))),0,',','.'); ?></b></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="height-10"></div>
			<div class="reservation-check">
				<div class="reservation-check-list">
					<div class="reservation-check-title"><?php echo Yii::t('main','Arrived at') ?></div>
					<div class="reservation-check-value"><?php echo date('d F Y',strtotime($session['reservation']['date_add'])); ?></div>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list">
					<div class="reservation-check-title"><?php echo Yii::t('main','Occupants') ?></div>
					<div class="reservation-check-value"><b><?php echo $session['reservation']['adults']; ?></b> <?php echo Yii::t('main','person(s)') ?></div>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list">
					<div class="reservation-check-title"><?php echo Yii::t('main','Leaved at') ?></div>
					<div class="reservation-check-value"><?php echo date('d F Y',strtotime($session['reservation']['date_end'])); ?></div>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list">
					<div class="reservation-check-title"><?php echo Yii::t('main','Nights Stay') ?></div>
					<div class="reservation-check-value"><b> <?php echo (gregoriantojd(date('m',strtotime($session['reservation']['date_end'])), date('d',strtotime($session['reservation']['date_end'])), date('Y',strtotime($session['reservation']['date_end'])))-gregoriantojd(date('m',strtotime($session['reservation']['date_add'])), date('d',strtotime($session['reservation']['date_add'])), date('Y',strtotime($session['reservation']['date_add'])))); ?></b> <?php echo Yii::t('main','Nights') ?></div>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list no-border">
					<div class="reservation-check-title">&nbsp;</div>
					<div class="reservation-check-value">&nbsp;</div>
					<div class="clear"></div>
				</div>
				<div class="reservation-check-list no-border">
					<div class="reservation-check-title"><?php echo Yii::t('main','No. Rooms') ?></div>
					<div class="reservation-check-value"><b> <?php echo $session['reservation']['room']; ?></b> <?php echo Yii::t('main','Room(s)') ?></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</p>

	</div>
	<div class="clear"></div>
</div>
<div align="right">
	<b><a href="<?php echo CHtml::normalizeUrl(array('reservation2', 'lang'=>Yii::app()->language)) ?>"><i class="icon-back"></i> <u><?php echo Yii::t('main','Back') ?></u></a></b> &nbsp; &nbsp; &nbsp; <b><a href="<?php echo CHtml::normalizeUrl(array('reservation1', 'lang'=>Yii::app()->language)) ?>"><i class="icon-close"></i> <u><?php echo Yii::t('main','Change my reservation') ?></u></a></b>
</div>
<h4 class="dark-blue"><?php echo Yii::t('main','Fill your personal information') ?></h4>
<hr/>

<div class="form-inner">
	<?php $form = $this->beginWidget('CActiveForm', array(
	    'id'=>'reservation-form',
	    'enableAjaxValidation'=>false,
	    'enableClientValidation'=>false,
	    // 'focus'=>array($this->model,'from'),
	    'clientOptions'=>array(
			'inputContainer'=>'.form-inner .row-form-inner',
		),
	)); ?>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'name'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php echo $form->textField($model,'name'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'name'); ?>
	</div>

	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'address'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php echo $form->textField($model,'address'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'address'); ?>
	</div>

	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'telp'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php echo $form->textField($model,'telp'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'telp'); ?>
	</div>

	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php echo $form->textField($model,'email'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'email'); ?>
	</div>
<?php

$list_negara = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
$negara = array();
foreach ($list_negara as $key => $value) {
	$negara[$value]=$value;
}
?>




	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'country'); ?>
		<div class="select-box-med">
			<div class="inner-box">
				<?php echo $form->dropDownList($model,'country',$negara); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'country'); ?>
	</div>


	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'card_holder'); ?>
		<div class="input-box-med">
			<div class="inner-box">
				<?php echo $form->textField($model,'card_holder'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'card_holder'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'visa'); ?>
		<div class="select-box-med">
			<div class="inner-box">
				<?php echo $form->dropDownList($model,'visa',array(
					'Visa'=>'Visa',
					'MasterCard'=>'MasterCard',
					'American Express'=>'American Express',
					'Discover'=>'Discover',
				)); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'visa'); ?>
	</div>

	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'credit_card', array('class'=>'control-label')); ?>
		<div class="control-group ">
			<div class="input-box-small">
				<div class="inner-box">
				<?php echo $form->textField($model, 'cc1'); ?>
				</div>
		    </div>
			<div class="input-box-small">
				<div class="inner-box">
				<?php echo $form->textField($model, 'cc2'); ?>
				</div>
		    </div>
			<div class="input-box-small">
				<div class="inner-box">
				<?php echo $form->textField($model, 'cc3'); ?>
				</div>
		    </div>
			<div class="input-box-small">
				<div class="inner-box">
				<?php echo $form->textField($model, 'cc4'); ?>
				</div>
		    </div>
		</div>    
	    <div class="clear"></div>
		<?php echo $form->error($model,'credit_card'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'expiration'); ?>
		<div class="control-group ">
			<div class="input-box-small">
				<div class="inner-box">
					<?php echo $form->dropDownList($model,'bulan',$bulan); ?>
				</div>
		    </div>
			<div class="input-box-small">
				<div class="inner-box">
					<?php echo $form->dropDownList($model,'tahun',$tahun); ?>
				</div>
		    </div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'expiration'); ?>
	</div>
	<div class="height-10"></div>
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'verification'); ?>
		<div class="input-box-small">
			<div class="inner-box">
				<?php echo $form->textField($model,'verification'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'verification'); ?>
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
	<div class="height-15"></div>
	<?php $this->endWidget(); ?>
</div>
				
				
				<div class="height-20"></div>
				