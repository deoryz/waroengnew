<?php
/* @var $this StockController */

$this->breadcrumbs=array(
	'Stock',
);

$mTime = mktime(0,0,0,$_GET['bulan']+1,0,$_GET['tahun']);
$mTimePrev = mktime(0,0,0,$_GET['bulan'],0,$_GET['tahun']);
$mTimeNext = mktime(0,0,0,$_GET['bulan']+2,0,$_GET['tahun']);
?>
<h1>Stock Rooms</h1>
<h3>

<a href="<?php echo CHtml::normalizeUrl(array('index', 'tahun'=>date('Y',$mTimePrev), 'bulan'=>date('m',$mTimePrev) )) ?>">Prev</a> 
<?php echo date('F',$mTime) ?> 
<a href="<?php echo CHtml::normalizeUrl(array('index', 'tahun'=>date('Y',$mTimeNext), 'bulan'=>date('m',$mTimeNext) )) ?>">Next</a>
</h3>
<?php
$jumlahTanggal = cal_days_in_month(CAL_GREGORIAN, $_GET['bulan'], $_GET['tahun']);
$package = Package::model()->findAll();
?>
<table class="items table">
<thead>
	<tr>
		<th>&nbsp;</th>
		<?php foreach ($package as $key => $value): ?>
		<th><?php echo $value['name'] ?></th>
		<?php endforeach ?>
		<th>Jumlah</th>
	</tr>
</thead>
<tbody>
	<?php
	for ($i=1; $i <= $jumlahTanggal; $i++) { 
	?>
	<tr class="odd">
		<th><?php echo date('d F Y',strtotime($tanggalKeI = $_GET['tahun'].'-'.$_GET['bulan'].'-'.substr('00'.$i,-2))) ?></th>
		<?php $tempJum = 0 ?>
		<?php foreach ($package as $key => $value): ?>
		<td><?php
		if (array_key_exists($tanggalKeI, $dataBulan)) {
			
			echo $jumlah = $value->qty-$dataBulan[$tanggalKeI]['id_pack'][$value->id];
			$tempJum = $tempJum + $jumlah;
		} else {
			echo $value->qty;
			$tempJum = $tempJum + $value->qty;
		}
		
		?></td>
		<?php endforeach ?>
		<td><?php echo $tempJum ?></td>
	</tr>
	<?php
	}
	?>
</tbody>
</table>
