<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=288236191284209";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="container text-align-center">
		<div class="height-40"></div>
		<h1 class="main-title">WAROENG.WEB.ID</h1>
		<div class="line-content"></div>
		<h2>Hosting Murah Berkualitas</h2>
		<div class="height-30"></div>
		<div class="fb-like" data-href="https://www.facebook.com/waroengwebid" data-send="true" data-width="450" data-show-faces="true" data-colorscheme="dark"></div>
		<div class="height-30"></div>
		<div class="line-content"></div>
		<div class="height-15"></div>
		<p class="menu">
			<a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a> &nbsp; | &nbsp; 
			<a href="<?php echo CHtml::normalizeUrl(array('/home/domain')); ?>">DOMAIN</a> &nbsp; | &nbsp; 
			<a href="<?php echo CHtml::normalizeUrl(array('/home/hosting')); ?>">HOSTING</a> &nbsp; | &nbsp; 
			<a href="<?php echo CHtml::normalizeUrl(array('/home/emailhosting')); ?>">EMAIL HOSTING</a> &nbsp; | &nbsp; 
			<a href="<?php echo CHtml::normalizeUrl(array('/home/contact')); ?>">CONTACT US</a> &nbsp; | &nbsp; 
			<a href="<?php echo CHtml::normalizeUrl(array('#')); ?>">JUMP TO APA AJA ADA</a>
		</p>
		<div class="line-content"></div>
		<div class="height-30"></div>
			<?php echo $content ?>
		<div class="height-30"></div>
		<h3>PEMESANAN HUBUNGI:</h3>

		<p>			
		<a href="ymsgr:sendIM?deoryz">
			<img src="http://opi.yahoo.com/online?u=deoryz&m=g&t=8&l=us">
		</a>
		<a href="ymsgr:sendIM?vafrcor2007">
			<img src="http://opi.yahoo.com/online?u=vafrcor2007&m=g&t=8&l=us">
		</a>
		<br/><br>
		ATAU
		</p>
		<h3><a href="<?php echo CHtml::normalizeUrl(array('/home/contact')); ?>">Kontak Kami</a></h3>
		<div class="height-30"></div>
		<p>waroeng.web.id. For your hosting problems. Indonesia <br>
		Website design by <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">waroeng.web.id</a>.</p>
		<div class="height-30"></div>

	</div>
<?php $this->endContent(); ?>