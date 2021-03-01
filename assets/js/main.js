$(document).ready(function () {
   	$('.ui.sticky').sticky({
		context: '#showart'
	});
	$("#mainnav").visibility({type:"fixed"});


	$('body').on('click','.removeRec', function () {
		if(confirm('دڵنیای له‌سڕینه‌وه‌ی؟')){
			var id = $(this).data('id');
			var page = $(this).data('page');
			var th = $(this).parent().parent();
			$.post(mainUrl+page, {id: id}, function(data) {
				data = JSON.parse(data);
				if(data.states == "ok"){
					$(th).hide('slow');
				}
				$('body').toast({
					class: data.class,
					message: data.msg,
					displayTime: 6000
				},'json');
			});
		}
	});
    $('body').on('submit','#modalformall',function(e){
		e.preventDefault();
		$('#subbtn').attr('disabled', 'disabled');
		var form = $('#modalformall').get(0); 
		
		var formSendda = $(form).data('sent');
		var formdata = new FormData(form);
		
		var req = new XMLHttpRequest();
		
		req.addEventListener('load',function(e){
			var data = {};
			try {
				data = JSON.parse(e.currentTarget.response);

				if(data.states == "ok"){
					if(typeof data.redirect != "undefined"){
						location.href = mainUrl+data.redirect;	
					} else {
						$.post(mainUrl+formSendda+"/getdata", {get: 1}, function(getdata) {
							$('#showdata').html(getdata)
							$('.ui.modal').modal('hide');
						});
					}
				}
				$('body').toast({
					class: data.class,
					message: data.msg,
					displayTime: 6000
				});
			} catch (error) {

			}
			
			$('#subbtn').removeAttr('disabled');

		});
		req.open('post',mainUrl+formSendda+"/action",'true');
		req.send(formdata);
		return false;
	});
});