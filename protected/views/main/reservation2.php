<?php
/* @var $this MainController */

$this->breadcrumbs=array(
	Yii::t('main','Reservation (Step 2)'),
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper(Yii::t('main','Reservation (Step 2)'));
} else {
$this->pageName = (Yii::t('main','Reservation (Step 2)'));
}
// $this->pagePic = 'page-1.jpg';
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancy',
	'cssFile'=>Yii::app()->baseUrl.'/asset/css/fancy/jquery.fancybox.css',
	'config'=>array(
		// 'padding'=>'15',
	),
));
$this->pageTitle = Yii::t('main','Reservation (Step 2)').' - '.$this->pageTitle;
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/gallery/jquery.ad-gallery.css">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/asset/js/gallery/jquery.ad-gallery.js"></script>

				<h3 class="font-normal"><?php echo Yii::t('main','Make Your Reservation. <span>(Step 2)</span>') ?></h3>
	<hr/>
	<div class="row-form-inner">
	<?php echo CHtml::errorSummary($model); ?>
	</div>

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
		<div class="reservation-check-value"><b> <?php echo gregoriantojd(date('m',strtotime($session['reservation']['date_end'])), date('d',strtotime($session['reservation']['date_end'])), date('Y',strtotime($session['reservation']['date_end'])))-gregoriantojd(date('m',strtotime($session['reservation']['date_add'])), date('d',strtotime($session['reservation']['date_add'])), date('Y',strtotime($session['reservation']['date_add']))); ?></b> <?php echo Yii::t('main','Nights') ?></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
				<div class="height-10"></div>
<div style="margin-bottom: -30px;"></div>
<div align="right">
	<b><a href="<?php echo CHtml::normalizeUrl(array('reservation1', 'lang'=>Yii::app()->language)) ?>"><i class="icon-close"></i> <u><?php echo Yii::t('main','Change my reservation') ?></u></a></b>
</div>
<div class="height-5"></div>
<h4 class="dark-blue"><?php echo Yii::t('main','Which room and rate would you like?') ?></h4>
<div style="margin-bottom: -15px;"></div>
<div class="form-inner">
	<div class="height-10"></div>

	<div class="row-form-inner">
	</div>
	<?php /*
	<div class="row-form-inner">
		<?php echo $form->labelEx($model,'id_pack'); ?>
		<div class="radio-box">
			<div class="inner-box">
				<?php
				$dataPack = Package::model()->findAll();
				$packArray = array();
				foreach ($dataPack as $key => $value) {
					$packArray[$value['id']] = $value['name'].' Price Rp. '.number_format($value['price'],2).' Per Malam';
				}
				?>
				<?php echo $form->radioButtonList($model, 'id_pack', 
				$packArray
				); ?>
				<?php // echo $form->textField($this->model,'from'); ?>
			</div>
	    </div>
	    <div class="clear"></div>
	    <?php echo $form->error($model,'id_pack'); ?>
	</div>
	<div class="height-10"></div>
	*/ ?>
	<table class="table-custom1">
		<tr>
			<th width="200"><?php echo Yii::t('main','Room Types') ?></th>
			<th><?php echo Yii::t('main','Max') ?></th>
			<th><?php echo Yii::t('main','Rate <span class="font-normal">(per room per night)</span>') ?></th>
			<th><?php echo Yii::t('main','No. Rooms') ?></th>
			<th>&nbsp;</th>
		</tr>
		<?php
		$dataPack = Package::model()->findAll();
		$packArray = array();
		foreach ($dataPack as $key => $value) {
			$check = $model->checkPack($value['id'],$session['reservation']['date_add'],$session['reservation']['date_end'], $session['reservation']['room'])
		?>
		<?php $form = $this->beginWidget('CActiveForm', array(
		    'id'=>'reservation-form-'.$key,
		    'enableAjaxValidation'=>false,
		    'enableClientValidation'=>false,
		    // 'focus'=>array($this->model,'from'),
		    'clientOptions'=>array(
				'inputContainer'=>'.form-inner .row-form-inner',
			),
		)); ?>
		<?php
		$model->id_pack=$value['id'];
		if ($key==0) {
			$model->room=1;
		}else{
			$model->room=0;
		}
		?>
		<tr class="reservation-form-<?php echo $key ?> reservation-tr <?php echo ($model->room==1)?'active':'' ?>">
			<td>
				<div align="center">
				<?php echo $form->hiddenField($model,'id_pack'); ?>
				<h4 class="title"><?php echo $value['name'] ?></h4>
				<img class="shadow-7" src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(130,100,'/images/room/'.$value['foto']['image'],array('method'=>'resize','quality'=>'90')) ?>" />
				<div class="height-5"></div>
				<a href="<?php echo CHtml::normalizeUrl(array('/main/roominfo', 'id'=>$value['id'], 'lang'=>Yii::app()->language)) ?>" class="fancy fancybox.ajax"><i class="icon-view"></i> <b><?php echo Yii::t('main','View more details') ?></b></a>
				<?php if ($value['no_smoking']=='1'): ?>
				<div class="height-5"></div>
				<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/non-smoking-room.jpg" />
				<?php endif ?>
				<div class="height-5"></div>
				</div>
			</td>
			<td align="center">
				<p align="center">
				<?php
				for ($i=0; $i < $value['max']; $i++) { 
					echo '<i class="icon-people"></i> ';
				}
				?>
				</p>
			</td>
			<td>
				<p align="center">
				<b>Rp. <?php echo number_format($value['price'],2,',','.') ?> <?php echo Yii::t('main',Package::model()->getPriceType($value->price_type)) ?></b><br />
				<?php echo ($value['caption_'.Yii::app()->language]) ?>
				</p>
			</td>
			<td>
				<div class="row-form-inner">
					<div class="input-box-vsmall" style="margin: 0px auto; float: none;">
						<div class="inner-box">
							<?php echo $form->dropDownList($model,'room',array(
							''=>'0',
							'1'=>'1',
							'2'=>'2',
							'3'=>'3',
							'4'=>'4',
							'5'=>'5',
							'6'=>'6',
							'7'=>'7',
							'8'=>'8',
							'9'=>'9',
							),array('class'=>'reservation-room', 'data-class'=>'reservation-form-'.$key)); ?>
						</div>
				    </div>
				    <div class="clear"></div>
				</div>
			</td>
			<td>
				<?php if ($check==TRUE): ?>
				<div class="row-form-inner">
					<div class="button-book-now" style="margin: 0px auto; float: none;">
						<div class="inner-box">
							<input type="submit" name="submit" value=" " />
						</div>
				    </div>
				    <div class="clear"></div>
				</div>
				<?php else: ?>
				<p align="center">Room Not Available</p>
				<?php endif ?>
			</td>
		</tr>
	<?php $this->endWidget(); ?>
	<?php
		}
	?>
	<script type="text/javascript">
		$('.reservation-room').live('change',function(){
			jml = $(this).val();
			if(jml==0){
			$(this).val('1');
			}else{
			$('.reservation-room').val('');
			$(this).val(jml);
			}
			data = $(this).attr('data-class');
			$('.reservation-tr').removeClass('active')
			$('.'+data).addClass('active')
		})
	</script>
	</table>
	<div class="height-15"></div>
</div>
				
				
				<div class="height-20"></div>
				