<?php

class PackageFotoController extends ControllerAdmin
{
	public $varGet = 'package'; 
	public $varFk = 'id_package'; 
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/mainKosong';

	public function init()
	{
		if($_GET[$this->varGet]==NULL)
			throw new CHttpException(404,'The requested page does not exist.');
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			// 'accessControl', // perform access control for CRUD operations
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
		$model=new PackageFoto;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PackageFoto']))
		{
			$model->attributes=$_POST['PackageFoto'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			$img = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$img->name;
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$count = count(PackageFoto::model()->findAll($this->varFk.' = :'.$this->varFk,array(':'.$this->varFk=>$_GET[$this->varGet])));
					$model->sort = $count+1;
					$img->saveAs(Yii::getPathOfAlias('webroot').'/images/room/'.$model->image);
					$model->save();
					$model->setToMain($model);
					Log::createLog("Package Foto Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]));
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
		$this->performAjaxValidation($model);

		if(isset($_POST['PackageFoto']))
		{
			$image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['PackageFoto'];
			$model->image = $image;//mengembalikan nama file
			$model->{$this->varFk} = $_GET[$this->varGet];
			$img = CUploadedFile::getInstance($model,'image');//mengaktifkan upload file
			if($img->name!=''){//jika di edit
				$model->image = substr(md5(time()),0,5).'-'.$img->name;
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if($img->name!=''){//jika di edit
						$img->saveAs(Yii::getPathOfAlias('webroot').'/images/room/'.$model->image);//upload file
						unlink(Yii::app()->basePath."/../images/room/".$image);
					}
					$model->save();
					$model->setToMain($model);
					Log::createLog("Package Foto Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]));
				}
				catch(Exception $ce)
				{
					echo $ce;
				    $transaction->rollback();
					exit;
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
			unlink(Yii::app()->basePath."/../images/room/".$data->image);
			Log::createLog("Package Foto Delete $data->id");
			$data->delete();
			PackageFoto::model()->sortUlang($this->varGet, $this->varFk);
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin', $this->varGet=>$_GET[$this->varGet]));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PackageFoto', array(
		    'criteria'=>array(
		        'condition'=>''.$this->varFk.'="'.$_GET[$this->varGet].'"',
		        'order'=>'sort ASC',
		    ),
		    'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PackageFoto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PackageFoto'])){
			$model->attributes=$_GET['PackageFoto'];
		}
		$model->{$this->varFk} = $_GET[$this->varGet];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSort()
	{
		PackageFoto::model()->sortTo($this->varGet, $this->varFk);
		$this->redirect(array('index', $this->varGet=>$_GET[$this->varGet], 'iframe'=>$_GET['iframe']));//redirect ke view
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PackageFoto::model()->find('id = :id AND '.$this->varFk.' = :'.$this->varFk,array(':id'=>$id,':'.$this->varFk=>$_GET[$this->varGet]));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='package-foto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
