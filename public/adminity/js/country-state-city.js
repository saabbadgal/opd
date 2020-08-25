$(document).on('change','.state_change',function(){
	el = $(this);
 	state_id = $(this).val();
 	city_route = $('#city_route').val();

 	$.get(city_route+'/'+state_id, function(datas, status){
 		 		el.parent().siblings('.city').html(datas);
 		 		el.parent().siblings('.city').children('.cities_id').attr('name','cities[]');

 		 	});
 	
});


$(document).on('change','.country',function(){

		el = $(this);
	 	state_route = $('#state_route').val();
	 	country_id = $(this).val();
	 	$.get(state_route+'/'+country_id, function(datas, status){
	 		el.parent().siblings('.state').html(datas);
	 		el.parent().siblings('.state').children('.state_change').attr('name','states_id[]');
	 	});
	 });

$(document).ready(function(){


	

// $("#state").on('change',function(){

// 		el = $(this);
// 		 city_route = $('#city_route').val();
// 		 state_id = $(this).val();

// 		 alert(state_id);
// 		 $.get(city_route+'/'+state_id, function(datas, status){
// 		 		el.parent().siblings('cities').html(datas);
// 		 	});
// 		});
	

	 $("#country").on('change',function(){

	 	state_route = $('#state_route').val();
	 	country_id = $("#country").val();

	 	$.get(state_route+'/'+country_id, function(datas, status){
	 		$("#state_field").html(datas);
	 		get_cities();
	 	});

	 });

	});


	function get_cities(){

		$("#state").on('change',function(){

		 	city_route = $('#city_route').val();
		 	state_id = $("#state").val();
		 	$.get(city_route+'/'+state_id, function(datas, status){
		 		$("#city_field").html(datas);
		 	});
		});

}