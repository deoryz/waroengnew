<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language ?>" />

	<meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
	<meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">

	<?php Yii::app()->bootstrap->registerCoreCss(); ?>
	<?php Yii::app()->bootstrap->registerCoreScripts(); ?>
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/normalize.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/screen.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/comon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/fonts.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/css/styles.css" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
	    'target'=>'',
	    'config'=>array(),
    )); ?>
    <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-33722220-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</head>

<body>
<?php echo $content ?>
</body>
</html>
