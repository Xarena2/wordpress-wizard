$j = jQuery.noConflict();
$j(document).ready(function($){
	
	var form1 = $('#form1');
	var form2 = $('#form2');
	var form3 = $('#form3');
	var form4 = $('#form4');

	var link_contact = $("link-contact");
	var link_quantity = $("link-quantity");
	var link_price = $("link-price");
	var link_done = $("link-done");
	
	let datas = [];
	var current_width = $(document).width();
	var step_left = "0px";
	let newurl = window.wp_data.ajax_url;

	var cur, newpos = '';
	
	switch(true) {
		case current_width<575 && current_width>382:
			step_left="10px";
			break;
		case current_width<766 && current_width>576:
			step_left="20px";			
			break;
		case current_width<992 && current_width>767:
			step_left="40px";			
			break;
		case current_width>993:
			step_left="40px";			
			break;
	}
		
	$('#next1').click(function(e){
		e.preventDefault();
		var name = $('#set-name').val();
		var email = $('#set-email').val();
		var phone = $('#set-phone').val();
		
		datas.push(name);
		datas.push(email);
		datas.push(phone);
		
		if (email !== '') {
			form1.css('left', '-1000px');
			form2.css('left', step_left);
		}
	});
	$('#next2').click(function(){
		let quantity = $('#set-quantity').val();

		datas.push(quantity);

		if (quantity === '') {
			form1.css('left', '-1000px');
			form2.css('left', step_left);
			form3.css('left', '1000px');
		}

		switch(true){
			case quantity < 10 && quantity>1:
				content = '$10';
				break;
			case quantity < 100 && quantity>11:
				content = '$100';
				break;

			case quantity < 1000 && quantity>101:
				content = '$1000';
				break;
			default:
				content = '$10';
				break;
		}

		$('#price1').html(content);
		datas.push(content);
		
	});

	$('#next3').click(function(){

		form2.css('left', '-1000px');
		form3.css('left', '-1000px');
		form4.css('left', step_left);

		let path =  window.wp_data.path;

		let success ='';

		var data1 = {'action': window.wp_data.action,
				'nonce': window.wp_data.nonce, 'name':datas[0], 'email':datas[1], 'phone':datas[2], 'quantity':datas[3], 'price':datas[4]};
	
		let success_url = path+"/assets/img/success.svg";
		let error_url = path+"/assets/img/error.svg";
		
		$j.post(
			newurl,
			data1,
			function(response) {
				while (datas.length) {
					datas.pop();
				}
				switch(response.success) {
					case 1:
						$("#image").attr('src', success_url);
						break;
					case 0:
						$("#image").attr('src', error_url);
						break;
				}
		}, 'json');

		
		
	});
	$("#next4").click(function(){
		form1.css('left', step_left);
		form2.css('left', '1000px');
		form3.css('left', '1000px');
		form4.css('left', '1000px');
	});
})
