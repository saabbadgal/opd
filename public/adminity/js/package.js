$(document).on('click','.del_des', function(){
	des_id = $(this).attr('des_id');
 	p_id = $(this).attr('p_id');
 	route = $("#des_del").val();
	 $.get(route+'/'+des_id+'/'+p_id, function(data){
	 	// console.log(data);
	 	next(2, p_id);
	 });
});

$(document).on('click','.tour_sel_price', function(){
	//e.preventDefault();
	 cd = $(this).attr('cd');
	 cal_all_tour_price(cd);
	 // $('.city_tour_price'+cd).val(price);
});

$(document).on('click','.ct', function(){
	day_number = $(this).attr('day_number');
	$('.day').text(day_number);
	$('.day_no').val(day_number);
});


$(document).on('click','.cal_ho_prc', function(){
	cal_all_price();
});

function cal_total_price(){
	prc =0;
	$('.t_prc').each(function(){
			prc =  parseInt(this.value) + parseInt(prc);
			$("#total_price").val(prc);
	});
}

$(document).on('click','.days', function(e){
	cl = $(this).val();
	id = $(this).attr('id');
	$("."+cl).prop("checked", false);
	$("#"+id).prop("checked", true);
	cal_all_price();
});

function each_cal(){
	total = 0
	$('.one_hotel_price').each(function(){
		total = parseInt( $(this).val())+ total;
	});

	if(isNaN(total)){
	 	total= 0;	
	 }
	$('.city_price').val(total);
}


function cal_all_tour_price(ids){
	total_price = 0;
	$('input:checkbox:checked.cal_tour'+ids).map(function(){
		price = $(".tour_price"+this.value).val();
		total_price = parseInt(price)  + parseInt(total_price);
	});
	$(".city_tour_price"+ids).val(total_price);
}


function cal_all_price(){
	
	$(".hotels").each(function(index){// console.log(index); 
		hoid = $(this).attr('id');
		price_id = $("input:radio.hotype"+hoid+":checked").val();
		 price = $("#hotype"+price_id).val();
		 day_count = $("#day_"+hoid).find(':checked').length;
		 	total_price = day_count * price;
		 	if(isNaN(total_price)){
		 		total_price= 0;	
		 	}
		 	$("#ho_prc"+hoid).val(total_price);
	});
	each_cal();
}

$(document).on('change','.tour_sel', function(){

	el = $(this);
	console.log(this.value);
	adult 	= $("#adult").val();
	child 	= $("#child").val();
	route 	= $("#tour_price_route").val();
	$.get(route+'/'+this.value+'/'+adult+'/'+child, function(data){
		if(data.status==1){
 			el.parent('.to').siblings('.tour').children('.tour_prc').val(data.price);
		}else{
			el.parent('.to').siblings('.tour').children('.tour_prc').val('0.00');
			el.parent('.to').append(`<div class="text-danger">No Price Available</div>`);
		}
		cal_total_price();
	});

});


$(document).on('change','.r_type', function(e){
	el = $(this);
	console.log(this.value);
	adult 	= $("#adult").val();
	child 	= $("#child").val();
	room 	= $("#room").val();
	route 	= $("#cal_price_route").val();
	$.get(route+'/'+this.value+'/'+adult+'/'+child+'/'+room, function(data){
		if(data.status==1){
 			el.parent('.type').siblings('.prc').children('.t_prc').val(data.price);
		}else{
			el.parent('.type').siblings('.prc').children('.t_prc').val('0.00');
			el.parent('.type').append(`<div class="text-danger">No Price Available</div>`);
		}
		cal_total_price();
	});
});

$(document).on('change','.hotel', function(e){

	el = $(this);
	route = $("#room_type_route").val();
	$.get(route+'/'+this.value, function(data){
		el.parent('.ho').siblings('.type').html(data);
	});

});

$(document).on('click','.form-control', function(){
	this.classList.remove('border', 'border-danger')
	$(this).siblings('.text-danger').remove();
});

$(document).on('click', '.next' , function(){

	step = $(this).attr('step');
	id  = $(this).attr('ids');
	next(step, id);

});

	$(document).on('submit','.term_form', function(e){
		e.preventDefault();
		console.log(this.action);
		id  = $(this).attr('ids');
		$.ajax({
				url:this.action,
				type:'POST',
				data: new FormData(this),
				processData:false,
				contentType:false,
				success:function(data){
						next(6, id);
					}
				});
	});

// $(document).ready(function(){
// 


	$(document).on("submit","#form_data", function(e){
		console.log(this.action);
		e.preventDefault();
		route = $("#pck_route").val();
		//pck_route
		 step = $("#step").val();//pck_route

			data =  $("#form_data").serialize();//new FormData(this);
		$.ajax({
				url:this.action,
				type:'POST',
				data: new FormData(this),
			    processData: false,
			    contentType: false,
				success:function(data ){
					console.log(data.id);

					 next(data.step, data.id)

					
				},
				error: function (request, status, error) {

					clearErrors();

					json = $.parseJSON(request.responseText);
		                $.each(json.errors, function(key, value){
		                	console.log(key, value);
		                	const firstItemDOM = document.getElementById(key);
		                	firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${value}</div>`)
		                	 firstItemDOM.scrollIntoView()
		                	 firstItemDOM.classList.add('border', 'border-danger')
		                    
		                });
		        
		    }
		});

	 });


$(document).on("submit",'.city_tour_form', function(e){
	e.preventDefault();
	action = $(this).attr('action');
	ids = $(this).attr('id');

	$.ajax({
		url: action,
		type:'POST',
		data: new FormData(this),
		processData:false,
		contentType:false,
		success:function(data){
			console.log(data);
			$("#ct"+ids).modal('hide');
			 m_id = $("#m_id").val();
					next(3, m_id);
		},
		error:function(request, status, error ){
			console.log(error);
		}
	})
});

	$(document).on("submit",'.itinerary_form', function(e){
		e.preventDefault();
		action = $(this).attr('action');
		console.log(action);
		$.ajax({
				url:action,
				type:'POST',
				data:new FormData(this),
				processData:false,
				contentType:false,
				success:function(data){
					console.log(data);
					packages_cities_id = $("#packages_cities_id").val();
					$("#m"+packages_cities_id).modal('hide');
					 m_id = $("#m_id").val();
					next(3, m_id);
				},
				error: function (request, status, error) {
				}
		});
	});

	$(document).on("submit",'.itinerary_detail', function(e){
		e.preventDefault();
		action = $(this).attr('action');
		console.log(action);
		$.ajax({
				url:action,
				type:'POST',
				data:new FormData(this),
				processData:false,
				contentType:false,
				success:function(data){
					console.log(data);

					$("#des_"+data.des_id).val(data.description);
					
					
				},
				error: function (request, status, error) {
				}
		});
	});
// });
// 
		$(document).on('click','.change_img', function(e){
			src = $(this).attr('src');
			$(this).parent('.more').siblings('.main').children('img').attr('src',src);

		});

function next(step, id){
	route = $("#pck_route").val();
	$.get(route+'/'+step+'/'+id,function(data){
		$("#res").html(data);
		$('.textarea').ckeditor();
	});
}

function final_price(){
	price = 0;
	$(".fprice").each(function(){
		city_price_id = $(this).attr('city_price');
		price = parseInt($(this).text()) + parseInt( price);
		$("#total_price"+city_price_id).html('<i class="fas fa-rupee-sign text-instagram"></i> '+price);
		
		$("#total_price").val(price);
	});
}

function clearErrors() {
                // remove all error messages
                const errorMessages = document.querySelectorAll('.text-danger')
                errorMessages.forEach((element) => element.textContent = '')
                // remove all form controls with highlighted error text box
                const formControls = document.querySelectorAll('.form-control')
                formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
            }


$(document).on('submit','#save',function(e){
	e.preventDefault();


	// $('#form_data').submit(function(){
	// 	data = new FormData(this);
	// console.log(data);
	// });
	// route = $("#pck_route").val();//pck_route
	// step = $("#step").val();//pck_route

	// data = new FormData('#form_data');
	// console.log(data);
	// form_data = $("#form_data").serialize();//pck_route
	// $.ajax({
	// 	'url':route+'/'+step,
	// 	'method':'POST',
	// 	'data':data,
	// 	'dataType':'json',
	// 	success:function(data){
	// 		// console.log(data);

	// 		$("#result").append(data);
	// 	}

	// })

	
});