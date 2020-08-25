
    
$(document).ready(function(){

  $(".counter").characterCounter();
  $('.datepicker').datepicker();
  $('.chips').chips();
 $('.chips-placeholder').chips({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
  });
  $('.chips-autocomplete').chips({
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: Infinity,
      minLength: 1
    }
  });
        var date = new Date();
       // date.setDate( date.getDate() );
        date.setFullYear( date.getFullYear() - 18);


        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth();//+1; //January is 0!
        var yyyy = today.getFullYear();
        // console.log(date.getMonth()  + '/' + (date.getDate()) + '/' + (date.getFullYear()));
        $('.dr-dob').datepicker({
            defaultDate: new Date(date.getFullYear(), date.getMonth(), date.getDate()),
        yearRange : 15,
             maxDate: new Date(date.getFullYear(), date.getMonth(), date.getDate())
        });

        
      });


  function choose_time( date ,shift , day , e){

    $('.timing').removeClass('teal text-white');

$(e).addClass('teal text-white');

    $("#proceed").attr('disabled',false);

        //console.log(date , day, shift);

        $("#day").val(day);
        $("#shift").val(shift);
        $("#date").val(date);
    return false;
  }




     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

  //    $(document).ready(function() {
  //   $('input#input_text, textarea#textarea2').characterCounter();
  // });
        
  