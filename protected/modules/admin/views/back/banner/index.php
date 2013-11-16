<?php
$this->breadcrumbs=array(
	'Banners',
);

$this->menu=array(
	array('label'=>'Add Banner', 'icon'=>'th-list','url'=>array('create')),
);
?>
<div class="row">
	<div class="span12">

	<div class="row">
		
		<div class="span6">
		<h2>Banners</h2>
		<ul class="thumbnails">
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/update/1')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/icon-slidekits-xl.png" alt="">
						<p class="text-tengah less">Welcome To Elmi</p>
					</div>
				</a>
			</li>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/update/2')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/advertising.png" alt="">
						<p class="text-tengah less">Pamper Your Taste Buds</p>
					</div>
				</a>
			</li>
			<?php /*
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/banner/update/3')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/gear.png" alt="">
						<p class="text-tengah less">Don't Miss Our Promotions</p>
					</div>
				</a>
			</li>
			*/ ?>
		</ul>
		</div>
		
		</div>
	</div>
</div>
 <?php //$this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); 
 ?><!-- <br/><br/> -->
 <?php //$this->widget('bootstrap.widgets.TbGridView',array(
	// 'id'=>'banner-grid',
	// 'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	// 'columns'=>array(
		// 'id',
		// 'title',
		// 'image',
		// 'content_en',
		// 'content_id',
		// 'content_ja',
		// /*
		// 'content_zn_ch',
		// */
		// array(
			// 'class'=>'bootstrap.widgets.TbButtonColumn',
			// 'template'=>'{update} {delete}'
		// ),
	// ),
// )); 
?>
