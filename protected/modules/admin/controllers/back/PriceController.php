<?php

class PriceController extends ControllerAdmin
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
		$model=new Price;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Price']))
		{
			$model->attributes=$_POST['Price'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			$model->from = date('Y-m-d',CDateTimeParser::parse($model->from, 'MM/dd/yyyy'));
			$model->to = date('Y-m-d',CDateTimeParser::parse($model->to, 'MM/dd/yyyy'));
			if ($model->type=='week') {
				foreach ($model->week as $key => $value) {
					$model->{'h'.$value}='y';
				}
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("PriceController Create $model->id");
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
		// date format
		if ($model->from!='') {
		$model->from = date('m/d/Y',CDateTimeParser::parse($model->from, 'yyyy-MM-dd'));
		$model->to = date('m/d/Y',CDateTimeParser::parse($model->to, 'yyyy-MM-dd'));
		}
		if ($model->room=='') {
			$model->room = '1';
		}
		if ($model->night=='') {
			$model->night= '1';
		}
		if ($model->priority=='') {
			$model->priority= '10';
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

		if(isset($_POST['Price']))
		{
			// print_r($_POST['Price']);
			$model->attributes=$_POST['Price'];
			$model->{$this->varFk} = $_GET[$this->varGet];
			$model->from = date('Y-m-d',CDateTimeParser::parse($model->from, 'MM/dd/yyyy'));
			$model->to = date('Y-m-d',CDateTimeParser::parse($model->to, 'MM/dd/yyyy'));
			for ($i=1; $i <= 7 ; $i++) { 
				$model->{'h'.$i}='n';
			}
			if ($model->type=='week') {
				foreach ($model->week as $key => $value) {
					$model->{'h'.$value}='y';
				}
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("PriceController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id, $this->varGet=>$_GET[$this->varGet]));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}
		// date format
		$model->from = date('m/d/Y',CDateTimeParser::parse($model->from, 'yyyy-MM-dd'));
		$model->to = date('m/d/Y',CDateTimeParser::parse($model->to, 'yyyy-MM-dd'));
		if ($model->week=='') {
			$model->week= $model->getWeek($model);
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
			$this->loadModel($id)->delete();

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
		$model=new Price('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Price'])){
			$model->attributes=$_GET['Price'];
		}
		$model->{$this->varFk} = $_GET[$this->varGet];

		$dataProvider=new CActiveDataProvider('Price');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	public function actionList()
	{
		$model = new Price;
		if ($_GET['tahun']=='' || $_GET['bulan']=='') {
			$_GET['tahun']=date('Y');
			$_GET['bulan']=date('m');
		}
		
		$dataBulan = Reservation::model()->ambilDataBulan($_GET['tahun'], $_GET['bulan']);
		
		$this->render('list', array(
			'dataBulan'=>$dataBulan,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Price('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Price'])){
			$model->attributes=$_GET['Price'];
		}
		$model->{$this->varFk} = $_GET[$this->varGet];

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
		$model=Price::model()->find('id = :id AND '.$this->varFk.' = :'.$this->varFk,array(':id'=>$id,':'.$this->varFk=>$_GET[$this->varGet]));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='price-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
