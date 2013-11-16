<script type="text/javascript">
	var detik = 0;
	var menit = 1;
	function eksekusi () {
		$.ajax({
			url: '<?php echo CHtml::normalizeUrl(array("/cron/index")) ?>',
			dataType: 'html',
			success: function(msg){
				$('.log').append(msg+'<br>');
				// console.log(msg);				
			},
			error: function(msg){
				alert('sending data error, cek your connection');
				console.log(msg);
			}
		});
	}
	function hitung_mundur () {
		if (detik==0) {
			menit = menit - 1;
			detik = 60;
		};
		detik = detik - 1;
		if (detik == 0 && menit == 0) {
			eksekusi();
			menit = 15;
		};
		$('.menit').html(menit);
		$('.detik').html(detik);
	}
	setInterval('hitung_mundur()', 1000);
</script>
<span class="menit"></span> : <span class="detik"></span><br>
<div class="log"></div>