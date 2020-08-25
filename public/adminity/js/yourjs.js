
// package destination remove start

$(document).on('click', '.add_des',function(){

	des_data = $("#des_data").html();
	$("#destination").append(des_data);

});


$(document).on('click','.remove_des', function(){
	
	$(this).parent().parent().remove();
});



// package destination remove end






$(document).on('click', '.edit',function(){
	
	$('.error').hide();
	$(".edit-form").show();
	window.scrollTo(0, 20);
	id = $(this).attr("id");

	name = $("#name_"+id).text();	
	iso  = $("#iso_"+id).text();	

	$("#edit-id").val(id);
	$("#name").val(name);
	$("#iso").val(iso);
});



$(document).on('click','.room_type', function(){
	$(this).addClass('disabled');
	var element = $(this);
	var len = $('.room_type_count:last').val();
	total =  parseInt(len)  + 1;
	route = $('#room_type_route').val();
	$.get(route+"/"+total, function(data, status){
		$('div.parent').append(data);
		element.removeClass('disabled');
		change_height();
		
	})
});

$(document).on('click','.room_price', function(){

	room_type_id = $(this).siblings('.room_type_id').val();
 	var element = $(this);//.attr('class');
	route = $('#room_price_route').val();
	console.log(room_type_id);
	$.get(route+'/'+room_type_id,function(data){
		// clas = element.parent().parent().parent().append(data); 
		$('#p-'+room_type_id).append(data);
		// change_height();
	})
});


function change_height(){

		hght = $(".parent").height();
		f_higt = hght + 100;
		$('.content').css('height',f_higt);	
}


$(document).on('click','.remove_room_type', function(){

	$(this).parent('.child').remove();
	change_height();
});

$(document).on('click','.remove_room_price', function(){

	$(this).parent().parent('tr').remove();
	change_height();

});

$(document).on('click','a',function(){
	hreaf = $(this).attr('href');
	if(hreaf=="#next"){
		
		$('#basic-forms').submit();
		
	}
	

});



$(document).on('click','.add_image', function(){
	
	var element = $(this);
	clone = $('#clone').html();
	$("#multi_image").append(clone);
});


$(document).on('click','.remove_image', function(){
	
	$(this).parent().remove();
});

$(document).on('change','#currency', function(){
	
	c_val = $(this).val();
	$(".currency").val(c_val);

});

$(document).on('click','.add_more_price', function(){
	
	
	clone = $('#append_price').html();
	console.log(clone);
	$("#price").append(clone);
});






