  <style type="text/css">
  #gallery {
    padding: 30px;
    background: transparent;
  }
  #descriptions {
    position: relative;
    height: 50px;
    background: #EEE;
    margin-top: 10px;
    width: 640px;
    padding: 10px;
    overflow: hidden;
  }
    #descriptions .ad-image-description {
      position: absolute;
    }
      #descriptions .ad-image-description .ad-description-title {
        display: block;
      }
  </style>
<div class="fancy-info">
	<div class="name"><?php echo $model->{'title_'.Yii::app()->language} ?></div>
	<div class="fancy-info-content">

		<div class="fancy-gallery">
			<div id="gallery" class="ad-gallery">
		      <div class="ad-image-wrapper">
		      </div>
		      <!-- <div class="ad-controls">
		      </div> -->
		      <div class="ad-nav">
		        <div class="ad-thumbs">
		          <ul class="ad-thumb-list">
		            <?php foreach ($model->facilities as $key => $value): ?>
					<li>
		              <a href="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(300,300,'/images/facilities/'.$value->image,array('method'=>'resize','quality'=>'90')) ?>">
		                <img src="<?php echo Yii::app()->baseUrl ?><?php echo ImageHelper::thumb(1000,50,'/images/facilities/'.$value->image,array('method'=>'resize','quality'=>'90')) ?>" class="image0">
		              </a>
		            </li>
		            <?php endforeach ?>
		          </ul>
		        </div>
		      </div>
		    </div>
	    </div>
		<div class="fancy-desc fancy-facilities">
			<div class="padding-20">
			<p>
				<b><?php echo Yii::t('main','Descriptions:') ?></b><br />
				<?php echo nl2br($model->{'desc_'.Yii::app()->language}) ?>
				<!-- Unforgettable weddings and celebrations are moments that are cherished for a lifetime.These special occasions require creativity, imagination and experience to make these events memorable. (Text masih contoh, mengambil dari site lain). --> 
			</p>
			<?php
			if (trim($model->{'facilities_'.Yii::app()->language})=='') {
			$features = array();
			} else {
			$features = explode("\n",$model->{'facilities_'.Yii::app()->language}); 
			}
			?>
			<?php if (count($features)>0): ?>
			<p>
				<b><?php echo Yii::t('main','Features:') ?></b><br />
				<ul>
				    <?php foreach ($features as $key => $value): ?>
					<li><?php echo $value ?></li>
				<?php endforeach ?>
				</ul>
			</p>
			<?php endif; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
  <script type="text/javascript">
  $(function() {
    var galleries = $('.ad-gallery').adGallery({
    	width: 300,
    	height: 250,
    	start_at_index: 0,
    	update_window_hash: false,
    });
    // $('#switch-effect').change(
      // function() {
        // galleries[0].settings.effect = $(this).val();
        // return false;
      // }
    // );
    // $('#toggle-slideshow').click(
      // function() {
        // galleries[0].slideshow.toggle();
        // return false;
      // }
    // );
    // $('#toggle-description').click(
      // function() {
        // if(!galleries[0].settings.description_wrapper) {
          // galleries[0].settings.description_wrapper = $('#descriptions');
        // } else {
          // galleries[0].settings.description_wrapper = false;
        // }
        // return false;
      // }
    // );
  });
  </script>