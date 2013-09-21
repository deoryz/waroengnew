<?php

class HomeController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

	public function actionIndex()
	{
		$this->pageTitle = 'Hosting, domain, email marketing, email blash - '.$this->pageTitle;
		$this->layout='//layouts/column1';
		$this->render('index', array(
		));
	}

	public function actionDomain()
	{
		$this->pageTitle = 'Jual domain murah - '.$this->pageTitle;
		$domain = Domain::model()->findAll('jenis LIKE :jenis',array(':jenis'=>'int'));
		$domainId = Domain::model()->findAll('jenis LIKE :jenis',array(':jenis'=>'id'));

		$this->layout='//layouts/column1';
		$this->render('domain', array(
			'domain'=>$domain,
			'domainId'=>$domainId,
		));
	}
	public function actionDomainpilih($tld)
	{
		$this->pageTitle = 'domain murah - '.$this->pageTitle;
		$domain = Domain::model()->find('tld LIKE :tld',array(':tld'=>$tld));

		// inisialisasi model
		$model =  new ContactForm;
		$model->scenario = 'domain';
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{

				// config email
				$messaged = $this->renderPartial('//mail/domain',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>$model->subject,
					'message'=>$messaged,
				);
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Trimakasih telah memesan, silahkan cek email untuk mengetahui cara pembayaran');
				$this->refresh();

			}

		}

		$this->layout='//layouts/column1';
		$this->render('domainpilih', array(
			'domain'=>$domain,
			'model'=>$model,
		));
	}
	public function actionHosting()
	{
		$this->pageTitle = 'Jual hosting personal dan profesional - '.$this->pageTitle;

		$this->layout='//layouts/column1';
		$this->render('hosting', array(
		));
	}
	public function actionEmailhosting()
	{
		$this->pageTitle = 'Jual email hosting - '.$this->pageTitle;

		$this->layout='//layouts/column1';
		$this->render('emailhosting', array(
		));
	}
	public function actionEmailmarketing()
	{
		$this->pageTitle = 'Jasa email marketing, database email - '.$this->pageTitle;

		$this->layout='//layouts/column1';

		// inisialisasi model
		$model =  new ContactForm;
		$model->scenario = 'insert';
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{

				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>$model->subject,
					'message'=>$messaged,
				);
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Trimakasih telah menghibungi kami, kami akan membalas email anda secepat mungkin');
				$this->refresh();

			}

		}

		$this->render('emailmarketing', array(
			'model'=>$model,
		));
	}

	public function actionContact()
	{
		$this->pageTitle = 'Hubungi Kami - '.$this->pageTitle;

		$this->layout='//layouts/column1';

		// inisialisasi model
		$model =  new ContactForm;
		$model->scenario = 'insert';
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{

				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>$model->subject,
					'message'=>$messaged,
				);
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Trimakasih telah menghibungi kami, kami akan membalas email anda secepat mungkin');
				$this->refresh();

			}

		}

		$this->render('contact', array(
			'model'=>$model,
		));
	}
}