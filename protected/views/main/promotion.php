<?php
/* @var $this MainController */
$page = Page::model()->with('images')->findByPk(5);
$this->breadcrumbs=array(
	$page->{'title_'.Yii::app()->language},
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper($page->{'title_'.Yii::app()->language});
} else {
$this->pageName = ($page->{'title_'.Yii::app()->language});
}
$this->pagePic = 'page-2.jpg';
$this->pageTitle = $page->{'title_'.Yii::app()->language}.' - '.$this->pageTitle;
?>

				<h3 class="font-normal"><?php echo $page->{'intro_'.Yii::app()->language} ?></h3>
				<div class="height-10"></div>
				<?php echo $page->{'content_'.Yii::app()->language} ?>
				<?php
				$promotion = Promotion::model()->findAll('active = 1');
				?>
				<?php foreach ($promotion as $key => $value): ?>
				<div class="promotion">
					<div class="promotion-pic">
						<p class="margin-bottom-5">
							<img src="<?php echo Yii::app()->baseUrl ?>/images/promo-1.jpg"/>
						</p>
					</div>
					<div class="promotion-content">
						<p>
						<span class="promotion-utama"><b><?php echo $value->name ?></b><br />
						<?php echo nl2br($value->{'desc_'.Yii::app()->language}) ?>
						</p>
						<a href="<?php echo CHtml::normalizeUrl(array('/main/reservation1', 'lang'=>Yii::app()->language)) ?>"><img src="<?php echo Yii::app()->baseUrl ?>/asset/images/button-book-now.png" /></a>
						
					</div>
					<div class="clear"></div>
				</div> 
				<hr class="margin-bottom-5" />
				<?php endforeach ?>
				

				<div class="height-5"></div>
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
				