$('.imgHvr').live('mouseover', function(){
	var a = $(this).attr('data-img');
	$(this).addClass('hover-yang-sekarang-di-pakek');
	var b = $('.imgHvr.hover-yang-sekarang-di-pakek img').attr('src');
	$(this).attr('data-img2', b);
	$('.imgHvr.hover-yang-sekarang-di-pakek img').attr('src', a);
})
$('.imgHvr').live('mouseout', function(){
	var a = $(this).attr('data-img2');
	$('.imgHvr.hover-yang-sekarang-di-pakek img').attr('src', a);
	$(this).removeClass('hover-yang-sekarang-di-pakek');
})