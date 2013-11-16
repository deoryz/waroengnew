<?php

class StockController extends ControllerAdmin
{
	public function actionIndex()
	{
		$model = new Reservation;
		if ($_GET['tahun']=='' || $_GET['bulan']=='') {
			$_GET['tahun']=date('Y');
			$_GET['bulan']=date('m');
		}
		
		$dataBulan = $model->ambilDataBulan($_GET['tahun'], $_GET['bulan']);
		
		$this->render('index', array(
			'dataBulan'=>$dataBulan,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}