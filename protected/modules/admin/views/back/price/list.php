<?php
/* @var $this StockController */

$this->breadcrumbs=array(
	'Stock',
);

$this->menu=array(
	array('label'=>'List Price', 'icon'=>'th-list','url'=>array('index', $this->varGet=>$_GET[$this->varGet])),
);

$mTime = mktime(0,0,0,$_GET['bulan']+1,0,$_GET['tahun']);
$mTimePrev = mktime(0,0,0,$_GET['bulan'],0,$_GET['tahun']);
$mTimeNext = mktime(0,0,0,$_GET['bulan']+2,0,$_GET['tahun']);
?>
<h1>Detail Price</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<h3>

<a href="<?php echo CHtml::normalizeUrl(array('list', 'tahun'=>date('Y',$mTimePrev), 'bulan'=>date('m',$mTimePrev), $this->varGet=>$_GET[$this->varGet] )) ?>">Prev</a> 
<?php echo date('F',$mTime) ?> 
<a href="<?php echo CHtml::normalizeUrl(array('list', 'tahun'=>date('Y',$mTimeNext), 'bulan'=>date('m',$mTimeNext), $this->varGet=>$_GET[$this->varGet] )) ?>">Next</a>
</h3>
<?php
$jumlahTanggal = cal_days_in_month(CAL_GREGORIAN, $_GET['bulan'], $_GET['tahun']);
print_r($model->getDetailPrice($_GET[$this->varGet]));
?>
<table class="items table">
<thead>
	<tr>
		<th>&nbsp;</th>
		<th>Price</th>
	</tr>
</thead>
<tbody>
	<?php
	for ($i=1; $i <= $jumlahTanggal; $i++) { 
	?>
	<tr class="odd">
		<th><?php echo date('d F Y',strtotime($tanggalKeI = $_GET['tahun'].'-'.$_GET['bulan'].'-'.substr('00'.$i,-2))) ?></th>
		<td>0</td>
	</tr>
	<?php
	}
	?>
</tbody>
</table>
