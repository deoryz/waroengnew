<?php

class OrderController extends Controller
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Order;

		$modelHosting=new OrderHosting;
		$modelDomain=new OrderDomain;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($model->jenis_produk=='Hosting') {

						$modelHosting->attributes=$_POST['OrderHosting'];
						$modelHosting->save();

						$dataHosting = Hosting::model()->findByPk($modelHosting->hosting_id);
						$dataHostingPrice = HostingPrice::model()->find(
							'hosting_id = :hosting_id AND periode = :periode', 
							array(':hosting_id'=>$dataHosting->id, ':periode'=>$model->periode)
						);

						$model->total = $dataHostingPrice->price;
						$model->biller_type = 'hosting';
						$model->biller_id = $modelHosting->id;
						$model->keterangan = 'Sewa Hosting '.$dataHosting->paket_name.' '.$dataHostingPrice->name.' ('.$modelHosting->domain.')';
					}else{
						$modelDomain->attributes=$_POST['OrderDomain'];
						$modelDomain->save();

						$dataDomain = Domain::model()->findByPk($modelDomain->domain_id);

						$model->total = $dataDomain->price;
						$model->biller_type = 'domain';
						$model->biller_id = $modelDomain->id;
						$model->keterangan = 'Beli Domain '.$modelDomain->domain.' '.$model->periode;
					}
					$model->end_date = date('Y-m-d', strtotime($model->start_date) + strtotime('+'.$model->periode.'m'));
					$model->update = date('Y-m-d H:i:s');
					$model->save();
					Log::createLog("OrderController Create $model->id");
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

		if ($model->start_date == '') {
			$model->start_date = date('Y-m-d');
		}

		$modelHosting->attributes=$_POST['OrderHosting'];
		$modelDomain->attributes=$_POST['OrderDomain'];

		$this->render('create',array(
			'model'=>$model,
			'modelHosting'=>$modelHosting,
			'modelDomain'=>$modelDomain,
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

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					Log::createLog("OrderController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
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
			$this->loadModel($id)->delete();

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
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$dataProvider=new CActiveDataProvider('Order');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
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
		$model=Order::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
