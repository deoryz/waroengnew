<?php
require_once('rajasmsreguler.php'); // panggil class rajasmsreuler
ob_start();
// api key , ambil di raja-sms.com 
$apikey='119031a79762228ed80ab262eb5803eb';
//
if (isset($_POST['sms_create'])) {
	if (($_POST['pesan'] != "") && ($_POST['no_hp'] != "")) {
		$nohp  = $_POST['no_hp'];
		$pesan = $_POST['pesan'];
		$sms = new smsreguler();
		$sms->key = $apikey;
		$sms->setTo($nohp);
		$sms->setText($pesan);
		$sts=$sms->send();
		// cek status 
		if (substr($sts,0,1)=='0') {
			echo "<div style='text-align:center'><br />\nBerhasil<br /><br />\n";		
			echo "<div style='text-align:center'><br />\n$sts<br /><br />\n";		
			echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
		} else {	
			echo "<div style='text-align:center'><br />\nGagal<br /><br />\n";		
			echo "<div style='text-align:center'><br />\n$sts<br /><br />\n";		
			echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
		}
	} else {	
		echo "<div style='text-align:center'><br />\nPesan Atau Tujuan Kosong<br /><br /><br />\n";
		echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
	}
} elseif (isset($_POST['sms_ceksaldo'])){
	$sms = new smsreguler();
	$sms->key = $apikey;
	$sts=$sms->saldo();
	// cek status 
	if (substr($sts,0,1)=='0') {
		echo "<div style='text-align:center'><br />\nBerhasil<br /><br />\n";		
		echo "<div style='text-align:center'><br />\n$sts<br /><br />\n";		
		echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
	} else {	
		echo "<div style='text-align:center'><br />\nGagal<br /><br />\n";		
		echo "<div style='text-align:center'><br />\n$sts<br /><br />\n";		
		echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
	}
} elseif (isset($_POST['sms_cekreport'])){
	$sms = new smsreguler();
	$sms->key    = $apikey;
	$sms->notran = 'demo123'; // notran hasil output dari kirim sms 
	$sts=$sms->smsreport();
	// cek status 
	echo "<div style='text-align:center'><br />\n$sts<br /><br />\n";		
	echo "<a href='index.php'>Kembali Ke Halaman Utama</a><br /><br />\n";
} else {	
	$no_hp = "";
	$pesan = "";
	echo "<b>http://raja-sms.com - SMS Reguler - Sample API</b><br><br>";	
	echo "<form name='submit_form' method='post' action='index.php'>\n";		
  	echo "<table cellpadding='0' cellspacing='0' class='center'>\n<tr>\n";
	echo "<td class='tbl'>No. Handphone </td>\n";
	echo "<td class='tbl'><input type='text' name='no_hp' value='$no_hp' maxlength='13'  class='textbox' style='width:150px;' />";
	echo "</tr>\n<tr>\n";		
	echo "<td valign='top' class='tbl'>Isi pesan<br><br>\n";
	echo "<td class='tbl'><textarea name='pesan' cols='150' rows='3' class='textbox' style='width:350px;'>$pesan</textarea></td>\n";
	echo "</tr>\n<tr>\n";		
	echo "<td align='center' colspan='3' class='tbl'>\n";
	echo "<input type='submit' name='sms_create' value='Kirim Sms' class='button'/><input type='submit' name='sms_ceksaldo' value='Cek Saldo' class='button'/><input type='submit' name='sms_cekreport' value='Cek Report' class='button'/>\n</td>\n";
	echo "</tr>\n";	
	echo "</table>\n";
	echo "</form>\n";
}
?>