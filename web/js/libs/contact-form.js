$(document).ready(function() {
	$('form#contactForm').submit(function() {
		$('form#contactForm .error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).prev('label').text();
				$(this).addClass('hightlight').effect('shake', { times: 3 }, 100);
								
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('label').text();
					$(this).addClass('hightlight').css('color','#e2a7a7').effect('shake', { times: 3 }, 100);
					hasError = true;
				}else {
					$(this).removeClass('hightlight').css('color','#666');		
				}
			} else {
				$(this).removeClass('hightlight').css('color','#666');	
			}
		});
		if(!hasError) {
			$('.loading').fadeIn();
			$('form#contactForm li.buttons button').fadeOut('normal');
			
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contactForm').hide(600);	
				$('.form-success').fadeIn();			   
			});
		}
		
		return false;
		
	});
});