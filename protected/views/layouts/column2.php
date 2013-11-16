<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php echo $this->renderPartial('//layouts/_header') ?>
	<div class="container prelatife home-cont shadow-8 radius-1 background-2 content-dalam">
		<div class="reservation reservation-dalam">
			<div class="reservation-back shadow-7">
			<?php echo $this->renderPartial('//layouts/_reservation') ?>
			<?php /*
			<div class="title gotham"><?php echo Yii::t('main','Make Your Reservation') ?></div>
			<div class="garis-1"></div>
			<div class="form-reservation">
				<?php $form = $this->beginWidget('CActiveForm', array(
				    'id'=>'reservation-form',
				    'enableAjaxValidation'=>false,
				    'enableClientValidation'=>false,
				    'focus'=>array($this->model,'from'),
				)); ?>
				<div class="height-10"></div>
				<div class="row-form-reservation">
					<?php echo $form->labelEx($this->model,'from'); ?>
					<div class="input-box-med">
						<div class="inner-box">
							<?php echo $form->textField($this->model,'from'); ?>
						</div>
				    </div>
				    <div class="clear"></div>
   				</div>
				<div class="height-10"></div>
				<div class="row-form-reservation">
					<?php echo $form->labelEx($this->model,'to'); ?>
					<div class="input-box-med">
						<div class="inner-box">
							<?php echo $form->textField($this->model,'to'); ?>
						</div>
				    </div>
				    <div class="clear"></div>
   				</div>
				<div class="height-10"></div>
				<div class="row-form-reservation">
					<div class="reservation-occupants">
						<?php echo $form->labelEx($this->model,'person'); ?>
						<div class="input-box-vsmall">
							<div class="inner-box">
								<?php echo $form->dropDownList($this->model,'person',array(
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
				    </div>
					<div class="reservation-rooms">
						<?php echo $form->labelEx($this->model,'room'); ?>
						<div class="input-box-vsmall">
							<div class="inner-box">
								<?php echo $form->dropDownList($this->model,'room',array(
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
					    <span class="less"> <?php echo Yii::t('main','rooms(s)') ?></span>
					    <div class="clear"></div>
				    </div>
				    <div class="clear"></div>
   				</div>
				<div class="height-10"></div>
				<div class="row-form-reservation">
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
			<div class="garis-1"></div>
			<div class="hotline">
				<span class="gothamboldshad t-hotline"><?php echo Yii::t('main','Hotline') ?></span> <i class="icon-telp"></i> <span class="gothamshad t-telp">(+62-81) 6522571</span>
			</div>
			*/ ?>
			</div>
			<div class="shadow-5"></div>
		</div>
		<div class="content-left">
			<div style="height: 384px;">
				
			</div>
			<div class="height-20"></div>
			<div class="iklan-left">
				<?php
				$banner = Banner::model()->findAll();
				$promotion = Promotion::model()->find('main = 1');
				?>
				<div class="iklan-list">
					<div class="title-list">
						<?php echo Yii::t('main','DON\'T MISS OUR <b>PROMOTIONS</b>') ?>
					</div>
					<div>
						<div class="iklan-img">
								<p><img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(86,71,'/images/promo/'.$promotion->image,array('method'=>'resize','quality'=>'90')) ?>" /></p>
						</div>
						<div class="iklan-content-dalam">
							<p><b><?php echo $promotion->name ?></b><br />
							<?php echo $promotion->{'desc_'.Yii::app()->language} ?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="iklan-link gothambold"><a href="<?php echo CHtml::normalizeUrl(array('/main/promotion', 'lang'=>Yii::app()->language)) ?>"><?php echo Yii::t('main','Read More') ?></a></div>
				</div>
				<div class="clear"></div>
				<div class="margin-left-10 margin-right-10  margin-bottom-10 garis-3"></div>
				<div class="iklan-list">
					<div class="title-list">
						<?php echo Yii::t('main','PAMPER <b>YOUR TASTE BUDS</b>') ?>
					</div>
					<div>
						<div class="iklan-img">
							<p><img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(86,71,'/images/banner/'.$banner[1]->image,array('method'=>'resize','quality'=>'90')) ?>" /></p>
						</div>
						<div class="iklan-content-dalam">
							<p><?php echo $banner[1]->{'content_'.Yii::app()->language} ?></p> 
						</div>
						<div class="clear"></div>
					</div>
					<div class="iklan-link gothambold"><a href="<?php echo CHtml::normalizeUrl(array('/main/restaurant', 'lang'=>Yii::app()->language)) ?>"><?php echo Yii::t('main','Read More') ?></a></div>
				</div>
				<div class="clear"></div>
				<div class="height-20"></div>
			</div>
		</div>
		<div class="content-right">
			<div class="height-15"></div>
			<?php if ($this->pagePic!=''): ?>
			<div class="content-image">
				<div class="img radius-1">
					<img src="<?php echo Yii::app()->baseUrl ?>/images/page/<?php echo $this->pagePic ?>" />
				</div>
				<div class="title gothammed shadow-10 radius-1"><?php echo $this->pageName ?></div>
				<div class="shadow-9"></div>
			</div>
			<?php endif ?>
			<div class="margin-right-30 margin-left-20">
			<div class="height-15"></div>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			    'links'=>$this->breadcrumbs,
			    'separator'=>' &gt; '
			)); ?>
			<div class="height-10"></div>
			<div class="text-def">
				<?php echo $content ?>
			</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="shadow-3 padding-1 radius-1">
			<div class="shadow-4 padding-1 radius-1">
				<div class="height-25"></div>
			</div>
		</div>
	</div>
<?php echo $this->renderPartial('//layouts/_footer') ?>
<?php $this->endContent(); ?>