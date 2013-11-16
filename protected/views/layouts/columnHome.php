<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Beli Aman, Jual Cepat',
)); ?>
 
    <p>FindToko.com adalah sebuah pasar online yang memungkinkan individu maupun pengusaha kecil menengah di Indonesia untuk membuka dan mengelola toko online mereka secara mudah, disamping memberikan pengalaman berbelanja online yang lebih aman dan nyaman.</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Pelajari Lebih Lanjut',
    )); ?></p>
 
<?php $this->endWidget(); ?>

	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>