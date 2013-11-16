<?php
if(is_dir($assets))
{
	Yii::app()->clientScript->registerCssFile($baseUrl . '/fileeditor.css');
	Yii::app()->clientScript->registerScriptFile($baseUrl.'/edit_area_full.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($baseUrl.'/fileeditor.js', CClientScript::POS_END);
}
else
	throw new Exception(Yii::t('fileeditor', 'fileeditor - Error: Couldn\'t find assets folder to publish.'));

?>