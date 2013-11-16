<?php
/* @var $this MainController */
$page = Page::model()->with('images')->findByPk(4);
$this->breadcrumbs=array(
	$page->{'title_'.Yii::app()->language},
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper($page->{'title_'.Yii::app()->language});
} else {
$this->pageName = ($page->{'title_'.Yii::app()->language});
}
$this->pagePic = 'page-fa.jpg';
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
				// $data = array(
					// array(
					// 'src'=>'facilities/l-facility.jpg',
					// 'judul'=>'Wedding & Celebrations',
					// 'text'=>'Unforgettable weddings and celebrations are moments that are cherished for a lifetime.These special occasions require creativity, imagination and experience to make these events memorable. (Text masih contoh, mengambil dari site lain).',
					// 'download'=>true,
					// 'gallery'=>array(
						// '07 DSC_4131 copy.jpg',
						// '24 DSC_4855.JPG',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility2.jpg',
					// 'judul'=>'Meeting & Events',
					// 'text'=>'We believe in partnerships with our clients, professional conference organizers and corporate companies to execute successful business meetings and events. (Text masih contoh, mengambil dari site lain)',
					// 'download'=>true,
					// 'gallery'=>array(
						// '_DSC1954 copy.jpg',
						// '_DSC1962 copy.jpg',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility3.jpg',
					// 'judul'=>'Coffee Shop (24 hours)',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '23 DSC_4451 copy.jpg',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility4.jpg',
					// 'judul'=>'Bar & Discotheque',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '30 DSC_4414 copy.jpg',
						// '31 DSC_4674 copy.jpg',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility5.jpg',
					// 'judul'=>'Health Centre',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// 'fitness Center.JPG',
						// 'GYM.JPG',
					// ),
					// ),
// 					
					// array(
					// 'src'=>'facilities/l-facility6.jpg',
					// 'judul'=>'Outdoor Swimming Pool',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// 'swimming pool.JPG',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility7.jpg',
					// 'judul'=>'Business Centre with Internet facility',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '37 DSC_4521 copy.jpg',
					// ),
					// ),
					// array(
					// 'src'=>'facilities/l-facility8.jpg',
					// 'judul'=>'Hair and Beauty Salon',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '18DSC_4605 copy.jpg',
					// ),
					// // masalah
					// ),
					// array(
					// 'src'=>'facilities/l-facility9.jpg',
					// 'judul'=>'Mini Shop',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '_DSC1962 copy.jpg',
					// ),
					// ),
					// array( 
					// 'src'=>'facilities/l-facility10.jpg',
					// 'judul'=>'Tour and Travel Arrangement',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '18DSC_4605 copy.jpg',
					// ),
					// ),
// 					
					// array(
					// 'src'=>'facilities/l-facility11.jpg',
					// 'judul'=>'Taxi and Limousine Service',
					// 'text'=>'(Di sini mohon diberikan text 1 paragraf.)',
					// 'download'=>false,
					// 'gallery'=>array(
						// '_DSC1962 copy.jpg',
					// ),
					// ),
// 					
				// );
				?>
				<?php foreach ($model as $key => $value): ?>
				<div class="rooms">
					<div class="rooms-pic">
						<p class="margin-bottom-5">
							<img src="<?php echo Yii::app()->request->baseUrl.ImageHelper::thumb(174,112, '/images/facilities/'.$value->facilitieMain->image , array('method' => 'adaptiveResize', 'quality' => '90')); ?>"/>
						</p>
					</div>
					<div class="rooms-content">
						<p>
						<b><?php echo $value->{'title_'.Yii::app()->language}; ?></b><br />
						<?php echo nl2br($value->{'desc_'.Yii::app()->language}); ?>
						</p>
						<div class="height-10"></div>
						<div class="ic-view">
							<a class="fancy fancybox.ajax" rel="group<?php echo $key ?>" href="<?php echo CHtml::normalizeUrl(array('/main/facilitiesinfo', 'id'=> $value->id, 'lang'=>Yii::app()->language)) ?>"><i class="icon-view"></i> <b><?php echo Yii::t('main','View more details & photos') ?></b></a>
						</div>
						<?php if($value->pdf == TRUE): ?><div class="ic-ftdown"><a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/upload/pdf/<?php echo $value->pdf ?>"><i class="icon-fdown"></i> <b><?php echo Yii::t('main','Download Fact Sheet') ?></b></a></div><?php endif; ?>
					</div>
					<div class="clear"></div>
				</div> 
				<hr class="margin-bottom-5" />
				<?php endforeach ?>
				<?php /*<div class="title-shadow shadow-10">
					Room Features:
				</div>
				<div class="height-10"></div>
				<div>
					<div class="list-2-colomn">
						<ul>
							<li>Individually controlled air-conditioning</li>
							<li>We're proud to provide TV Program with 60 channels
							consist of entertainment, movies, sport, news, science,
							etc, for your viewing satisfaction.</li>
						</ul>
					</div>
					<div class="list-2-colomn">
						<ul>
							<li>Mini bar</li>
							<li>Direct Dial Telephone, Home Country Direct</li>
							<li>Coffee and Tea Making Facilities.</li>
							<li>Room Service (24 hours)</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<hr/>*/ ?>
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
				