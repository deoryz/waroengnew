<?php

class MainController extends Controller
{
	public function actionIndex()
	{
		$this->layout = '//layouts/columnHome';
		$model = new Member;
		$login = new Member;
		$this->render('index',array(
			'model'=>$model,
			'login'=>$login,
		));
	}

}