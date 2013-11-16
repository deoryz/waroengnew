<?php
/* @var $this MainController */
$page = Page::model()->with('images')->findByPk(6);
$this->breadcrumbs=array(
	$page->{'title_'.Yii::app()->language},
);
if (Yii::app()->language == 'en' OR Yii::app()->language == 'id') {
$this->pageName = strtoupper($page->{'title_'.Yii::app()->language});
} else {
$this->pageName = ($page->{'title_'.Yii::app()->language});
}
$this->pagePic = 'pages-ourlocation.jpg';
$this->pageTitle = $page->{'title_'.Yii::app()->language}.' - '.$this->pageTitle;
?>

				<h3 class="font-normal"><?php echo $page->{'intro_'.Yii::app()->language} ?></h3>
				<div class="height-10"></div>
				<?php echo $page->{'content_'.Yii::app()->language} ?>
				<div class="height-10"></div>
				<div class="maps-location">
					<iframe width="654" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.id/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Hotel+Elmi+International,+Jalan+Jenderal+Sudirman,+Embong+Kali+Asin&amp;aq=0&amp;oq=Hotel+Elmi+International&amp;sll=-7.269481,112.743598&amp;sspn=0.008227,0.009645&amp;ie=UTF8&amp;hq=Hotel+Elmi+International,&amp;hnear=Jalan+Jenderal+Sudirman,+Surabaya,+Jawa+Timur+60271&amp;ll=-7.269481,112.743598&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe>
					<div class="clear"></div>
					<?php echo($this->setting['address1']['value_'.Yii::app()->language]) ?>
<!-- 					Jl. Panglima Sudirman 42 - 44, Surabaya.Phone. (+62 31) 5322571, 5345291  Fax. (+62-31) 5315615 -->
				</div>
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
				<div class="clear"></div>
				<div class="height-20"></div>
				