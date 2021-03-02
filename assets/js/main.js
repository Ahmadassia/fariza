$(document).ready(function () {
	$('.ui.sticky').sticky({
		context: '#showart'
	});
	$("#mainnav").visibility({type:"fixed"});

	$('body').on('click','.btnFollow', function () {
		var th = $(this);
		var type = $(th).data('type');
		var id = $(th).data('id');
		var typefollow = $(th).data('typefollow');
		$.post(mainUrl+'home/follow', {id: id,type:type,typefollow:typefollow}, function(data) {
			if(data.states == "ok"){
				if(typefollow == "follow"){
					$(th).removeClass("inverted");
					$(th).data("typefollow","unfollow");
				} else {
					$(th).addClass("inverted");
					$(th).data("typefollow","follow");
				}
			}
			$('body').toast({
				class: data.class,
				message: data.msg,
				displayTime: 6000
			},'json');
		},'json');
	});
	$('body').on('click','.prosForm', function () {
        var page = $(this).data('page');
        var id = $(this).data('id');
        $.post(mainUrl+page, {id:id},
            function (data, textStatus, jqXHR) {
                $('#prosForm').html(data);
				$('.ui.dropdown').dropdown();
                $('#prosForm').modal('show');
            }
        );
    });
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
