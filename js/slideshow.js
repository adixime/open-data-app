$(document).ready(function () {
	
	$('.slides img:not(:first-child)').hide();
	
	$('#next').on('click', function () {
		var current = $('.slides .current').index();
		var next = current + 1;
		
		
		if (next > $('.slides img').length -1){
			next = 0;
		}
		
		$('.slides .current').fadeOut(500, function (){
			$('.slides img')
				.eq(next)
				.fadeIn(500)
				.addClass('current')
			;
			
			$(this).removeClass('current');
			
		});
	
	});
	
	$('#prev').on('click', function () {
		var current = $('.slides .current').index();
		var prev = current - 1;
		
		
		$('.slides .current').fadeOut(500, function (){
			$('.slides img')
				.eq(prev)
				.fadeIn(500)
				.addClass('current')
			;
			
			$(this).removeClass('current');
			
		});
	
	});

	
	
});