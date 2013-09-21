<?php

class CronController extends Controller
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
		$last = Setting::model()->find('name = :name', array(':name'=>'last_fbpost'));
		$access_token = Setting::model()->find('name = :name', array(':name'=>'access_token'))->value;
		$now = time();
		$criteria = new CDbCriteria;
		$criteria->condition = 'status = "0"';
		$criteria->order = 'date_modif ASC';
		$fbpost = FbPost::model()->find($criteria);
		if ($fbpost) {
			if ($fbpost->interval > 15) {
				$fbpost->interval = $fbpost->interval - 15;
			}else{
				//kirim fb
				$fbpost->interval = $fbpost->interval - 15;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$data = array();
				$data['message'] = '['.$fbpost->category.'] '.$fbpost->text;
				$data['access_token'] = $access_token;
				if ($fbpost->link == '' AND $fbpost->image == '') {
					curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/feed');
				}elseif($fbpost->link != ''){
					$data['link'] = $fbpost->link;
					curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/links');
				}else{
					$data['source'] = '@'.Yii::getPathOfAlias('webroot').'/images/fbpost/'.$fbpost->image;
					curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102/photos');
				}
				// print_r($data);
				// exit;
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
				$result = curl_exec($ch);
				// echo curl_error($ch);
				curl_close( $ch );
				// echo $result;
				// exit;
	/*
	untuk input image
	{"id":"430219060422889","post_id":"428996930545102_430219077089554"}1
	{"id":"430219813756147","post_id":"428996930545102_430219837089478"}1
	untuk input link
	{"id":"430219633756165"}1

	*/
				$fbpost->result = $result;
				$fbpost->status = 1;
				$fbpost->date_send = date('Y-m-d H:i:s', $now);
			}
			$fbpost->save();
		}
		$last->value = date('Y-m-d H:i:s', $now);
		$last->save();
	}
	public function actionGetaccesstoken()
	{
		// $userid = Yii::app()->facebook->getUser();
		// if ($_GET['code'] != '') {
			// // echo $facebook->getAccessToken();
			// Yii::app()->facebook->setAccessToken($_GET['code']);
			// $userid = Yii::app()->facebook->getUser();
			// echo Yii::app()->facebook->getAccessToken();
		// }
		// if ($userid == 0 AND $_GET['code'] == '') {
			// $loginUrl = Yii::app()->facebook->getLoginUrl(array(
				// 'scope' => 'email,user_groups',
			// ));
			// echo $userid.'<a href="'.$loginUrl.'">Login</a>';
		// }
		// https://www.facebook.com/dialog/oauth?client_id=621614271216276&redirect_uri=http%3A%2F%2Fwaroeng.web.id%2F.dev%2Fcron%2Fgetaccesstoken&state=279f58e91d4c506fca1d122e29ea62d3&scope=email%2Cuser_groups
		$url = urlencode(Yii::app()->request->hostInfo.CHtml::normalizeUrl(array('cron/login')));
		$this->redirect('https://graph.facebook.com/oauth/authorize?type=user_agent&client_id=621614271216276&scope=manage_pages,publish_stream&redirect_uri='.$url);
	}
	public function actionLogin()
	{
		echo '
		<script>
		var hash = window.location.hash;
		window.location = "'.Yii::app()->request->hostInfo.CHtml::normalizeUrl(array('cron/login2')).'?"+hash.substr(1);
		// alert(hash.substr(1));
		</script>
		';
	}
	public function actionLogin2()
	{
		// Yii::app()->facebook->setAccessToken($_GET['access_token']);
		// try{
		// $userid = Yii::app()->facebook->api('/me', 'GET', array(
			// 'access_token'=>Yii::app()->facebook->getAccessToken(),
		// ));
		// }catch(FacebookApiException $e) {
		// echo($e->getType());
        // echo($e->getMessage());
		// }
		// echo $userid;
		// exit;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		$data = array();
		$data['access_token'] = $_GET['access_token'];
		// $url = 'https://graph.facebook.com/428996930545102?fields=access_token&access_token='.$_GET['access_token'];
		// echo $url;
		// $result = file_get_contents($url);
		// echo $result;
		// // print_r(json_decode($result));
		// exit;
		curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/428996930545102?fields=access_token&access_token='.$_GET['access_token']);
		// echo 'https://graph.facebook.com/428996930545102?fields=access_token&access_token='.$_GET['access_token'];
		// exit;
		// curl_setopt($ch, CURLOPT_URL, 'http://www.google.co.id');
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
		curl_setopt($ch, CURLOPT_CAINFO, Yii::getPathOfAlias('webroot'). '/fb_ca_chain_bundle.crt');
		
		try{
			$result = curl_exec($ch);
		}catch(FacebookApiException $e) {
			echo $e;
		}
		echo curl_error($ch);
		curl_close( $ch );
		echo $result;
		exit;
		$data = json_decode($result);
		echo $data->access_token;
		exit;
		$access_token = Setting::model()->find('name = :name', array(':name'=>'access_token'));
		$access_token->value = $data->access_token;
		$access_token->save();
		echo "Berhasil";
	}
}