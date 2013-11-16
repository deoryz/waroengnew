<?php

class FbPostController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('auth.filters.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FbPost;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FbPost']))
		{
			$model->attributes=$_POST['FbPost'];
			$img = CUploadedFile::getInstance($model,'image');
			if($img->name!=''){//jika di edit
				$model->image = substr(md5(time()),0,5).'-'.$img->name;
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($img->name!=''){//jika di edit
						$img->saveAs(Yii::getPathOfAlias('webroot').'/images/fbpost/'.$model->image);//upload file
					}
					if ($model->referensi != '') {
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_URL, 'http://api.adf.ly/api.php?key=7efadeae65372322ee0205a4d9e2616a&uid=476307&advert_type=int&domain=go.waroeng.web.id&url='.urlencode($model->referensi));
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
						$model->referensi_short = curl_exec($ch);
						curl_close( $ch );
					}
					$model->date_input = date('Y-m-d H:i:s');
					$model->date_modif = date('Y-m-d H:i:s');
					$model->save();
					if ($model->jenis == 1) {
						// get access token
						$access_token = Setting::model()->find('name = :name', array(':name'=>'access_token'))->value;

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						$data = array();
						$data['message'] = '['.$model->category.'] '.$model->text;
						if ($model->referensi_short != '') {
							$data['message'] = $data['message']."

							Referensi Dari: ".$model->referensi_short;
						}
						$data['access_token'] = $access_token;
						if ($model->link == '' AND $model->image == '') {
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/feed');
						}elseif($model->link != ''){
							$data['link'] = $model->link;
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/links');
						}else{
							$data['source'] = '@'.Yii::getPathOfAlias('webroot').'/images/fbpost/'.$model->image;
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/photos');
						}
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
						// eksekusi
						$result = curl_exec($ch);
						// echo curl_error($ch);
						curl_close( $ch );
						$model->result = $result;
						$model->date_send = date('Y-m-d H:i:s');
						$model->status = 1;
						$model->save();
					}
					if ($model->jenis == 2) {
						// get access token
						$access_token = Setting::model()->find('name = :name', array(':name'=>'access_token'))->value;

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						$data = array();
						$data['message'] = '['.$model->category.'] '.$model->text;
						if ($model->referensi_short != '') {
							$data['message'] = $data['message']."

							Referensi Dari: ".$model->referensi_short;
						}
						$data['access_token'] = $access_token;

						// get time last post
						$criteria = new CDbCriteria;
						$criteria->order = 'date_send DESC';
						$dateSend = FbPost::model()->find($criteria)->date_send;
						$dateSend = strtotime($dateSend);
						if ($dateSend<time()) {
							$dateSend = time();
						}
						$dateSend = $dateSend + $model->interval*60;
						$data['published'] = false;
						$data['scheduled_publish_time'] = $dateSend;
						if ($model->link == '' AND $model->image == '') {
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/feed');
						}elseif($model->link != ''){
							$data['link'] = $model->link;
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/links');
						}else{
							$data['source'] = '@'.Yii::getPathOfAlias('webroot').'/images/fbpost/'.$model->image;
							curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/photos');
						}
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
						// eksekusi
						$result = curl_exec($ch);
						// echo curl_error($ch);
						curl_close( $ch );
						$model->result = $result;
						$model->date_send = date("Y-m-d H:i:s",$dateSend);
						$model->status = 1;
						$model->save();
					}
					Log::createLog("FbPostController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FbPost']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['FbPost'];
			$model->image = $image;//mengembalikan nama file
			$img = CUploadedFile::getInstance($model,'image');//mengaktifkan upload file
			if($img->name!=''){//jika di edit
				$model->image = substr(md5(time()),0,5).'-'.$img->name;
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($img->name!=''){//jika di edit
						$img->saveAs(Yii::getPathOfAlias('webroot').'/images/fbpost/'.$model->image);//upload file
						@unlink(Yii::getPathOfAlias('webroot')."/images/fbpost/".$image);
					}
					$model->date_modif = date('Y-m-d H:i:s');
					$model->save();
					Log::createLog("FbPostController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			@unlink(Yii::app()->basePath."/../images/fbpost/".$data->image);
			Log::createLog("FB Post Delete $data->id");
			$data->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new FbPost('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FbPost']))
			$model->attributes=$_GET['FbPost'];

		$dataProvider=new CActiveDataProvider('FbPost');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FbPost('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FbPost']))
			$model->attributes=$_GET['FbPost'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FbPost::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fb-post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
