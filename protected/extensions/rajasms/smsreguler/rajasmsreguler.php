<?php
class smsreguler {
	protected $to;
	protected $text;
	public $key;
	public $notran;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function send() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$nohp  = $this->to;
		$pesan = urlencode($this->text); 
		$curlHandle = curl_init();
		$url="http://raja-sms.com/api/smssendv2.php?nohp=".$nohp."&pesan=".$pesan."&key=".$this->key;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		$err=explode('=',$hasil);
		if ($err[0]==0)  {
			$hasil=$hasil;
		} elseif ($err[0]==1 ){
			$hasil='Saldo Token SMS Habis';
		} elseif ($err[0]==2 ){
			$hasil='Masa Aktif Sudah Lewat';
		} elseif ($err[0]==3 ){
			$hasil='Domain Tidak Terdaftar/Salah';
		} elseif ($err[0]==4 ){
			$hasil='Key Tidak Terdaftar/Salah';
		} elseif ($err[0]==5 ){
			$hasil='Format Http Api SMS Salah';			
		} elseif ($err[0]==6 ){
			$hasil='Maksimum SMS PerHp PerHari';			
		} elseif ($err[0]==7 ){
			$hasil='Penulisan Nomor HP Salah';						
		} else {
			$hasil='Error';
		}		
		return $hasil;
	}
	public function saldo() {	
		$curlHandle = curl_init();
		$url="http://raja-sms.com/api/smssaldov2.php?key=".$this->key;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);			
		$err=explode('|',$hasil);
		if ($err[0]==-1 ){
			$hasil='user name and password failed';
		} elseif ($err[0]==-3 ){
			$hasil='Processing Error';
		} else {
			$hasil=$hasil;
		}
		return $hasil;		
	}	
	public function smsreport() {	
		$curlHandle = curl_init();
		$url="http://raja-sms.com/api/smsreportv2.php?notran=".$this->notran."&key=".$this->key;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}		
}
?>