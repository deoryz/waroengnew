<?php
/* @var $this MainController */
$page = Page::model()->findByPk(2);

$this->breadcrumbs=array(
	$page->{'title_'.Yii::app()->language},
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper($page->{'title_'.Yii::app()->language});
} else {
$this->pageName = ($page->{'title_'.Yii::app()->language});
}
$this->pagePic = 'page-2.jpg';
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancy',
	'cssFile'=>Yii::app()->baseUrl.'/asset/css/fancy/jquery.fancybox.css',
	'config'=>array(
		// 'padding'=>'15',
	),
));
$this->pageTitle = $page->{'title_'.Yii::app()->language}.' - '.$this->pageTitle;
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/gallery/jquery.ad-gallery.css">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/asset/js/gallery/jquery.ad-gallery.js"></script>

				<h3 class="font-normal"><?php echo $page->{'intro_'.Yii::app()->language} ?></h3>
				<div class="height-10"></div>
				<?php echo $page->{'content_'.Yii::app()->language} ?>
				<?php
				$package = Package::model()->findAll();
				?>
				<?php foreach ($package as $key => $value): ?>
				<div class="rooms">
					<div class="rooms-pic">
						<p class="margin-bottom-5">
							<img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(174,112,'/images/room/'.$value->foto->image,array('method'=>'adaptiveResize','quality'=>'90')) ?>"/>
						</p>
							<a class="fancy fancybox.ajax" href="<?php echo CHtml::normalizeUrl(array('/main/roominfo', 'id'=>$value['id'], 'lang'=>Yii::app()->language)) ?>" ><i class="icon-view"></i> <b><?php echo Yii::t('main','View more details & photos') ?></b></a>
					</div>
					<div class="rooms-content">
						<p>
						<b><?php echo $value['name'] ?></b><br />
						<?php echo $value['description_'.Yii::app()->language] ?><br />
						<br />
						<?php echo Yii::t('main','Price starts from <b>IDR ') ?><?php echo number_format($value['price'],0) ?> <?php echo Yii::t('main',Package::model()->getPriceType($value->price_type)) ?> / <?php echo Yii::t('main','night') ?></b>.<br />
						<?php echo ($value['caption_'.Yii::app()->language]) ?><br />
						</p>

					</div>
					<div class="clear"></div>
				</div> 
				<hr class="margin-bottom-5" />
				<?php endforeach ?>
				<div class="margin-bottom-5"></div>				
				<?php $fasilities = ($this->setting['general_fasilities']['value_'.Yii::app()->language]) ?>
				<?php
				if (trim($fasilities)=='') {
				$features = array();
				} else {
				$features = explode("\n",$fasilities); 
				}
				?>
				<?php if (count($features)>0): ?>
				<?php
				$features = array_chunk($features, ceil(count($features)/2));
				?>		
				<div class="title-shadow shadow-10">
					<?php echo Yii::t('main','Room Features:') ?>
				</div>
				<div class="height-10"></div>
				<div>
					<div class="list-2-colomn">
						<ul>
							<?php foreach ($features[0] as $key => $value): ?>
							<li><?php echo $value ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="list-2-colomn">
						<ul>
							<?php foreach ($features[1] as $key => $value): ?>
							<li><?php echo $value ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<hr/>
				<?php endif ?>
				<p><b><?php echo Yii::t('main','Share this:') ?></b>
				<?php
				$this->widget('application.extensions.socialShareWidget.SocialShareWidget', array(
			        'url' => '',                  //required
			        'services' => array('facebook', 'twitter'),       //optional
			        'htmlOptions' => array('class' => 'someClass'), //optional
			        // 'popup' => TRUE,                               //optional
			    ));
				?>
				</p>
				<div class="height-5"></div>
				<div class="height-20"></div>
				