<?php
/* @var $this MainController */
$page = Page::model()->with('images')->findByPk(3);
$this->breadcrumbs=array(
	$page->{'title_'.Yii::app()->language},
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper($page->{'title_'.Yii::app()->language});
} else {
$this->pageName = ($page->{'title_'.Yii::app()->language});
}
$this->pagePic = 'page-3.jpg';
$this->widget('application.extensions.fancyapps.EFancyApps', array(
	'target'=>'.fancy',
	'config'=>array(
		'helpers'=>array(
			'title'=>array(
				'type'=>'over',
			)
		),
	)
));
$this->pageTitle = $page->{'title_'.Yii::app()->language}.' - '.$this->pageTitle;
?>

				<h3 class="font-normal"><?php echo $page->{'intro_'.Yii::app()->language} ?></h3>
				<div class="height-10"></div>
				<?php echo $page->{'content_'.Yii::app()->language} ?>
				<div class="height-10"></div>
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
				<hr/>
				<h6><?php echo Yii::t('main','Restaurant on ELMI Hotel: (Click to enlarge)') ?></h6>
					<?php
					$foto = array(
						'23 DSC_4451 copy.jpg',
						'24 DSC_4855.JPG',
						'25 DSC_4870.JPG',
						'26 DSC_4920.JPG',
						'31 DSC_4674 copy.jpg',
						'BAR&LOUNGE.jpg',
						'buffet breakfast 1.JPG',
						'buffet breakfast 2.JPG',
					);
					?>
				<div class="height-5"></div>
				<div class="images">
					<?php foreach ($page->images as $key => $value): ?>
					<div class="image-list">
						<a class="fancy" href="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(800,600,'/images/gallery/'.$value->image,array('method'=>'resize','quality'=>'90')) ?>" title="<?php echo $value->title ?>">
							<img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(153,110,'/images/gallery/'.$value->image,array('method'=>'adaptiveResize','quality'=>'90')) ?>" />
						</a>
					</div>
					<?php endforeach ?>
					<div class="clear"></div>
				</div>
				<div class="height-20"></div>
				