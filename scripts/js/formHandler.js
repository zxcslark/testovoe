$(document).ready(function(){
    $('#feedback').submit(function(e){
    
        if($('#name').val().trim().length == 0 || $('#email').val().trim().length == 0) {
            $('.form_message').html("Пожалуйста, заполните все поля");
            return false;
        }

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '../scripts/php/send.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $('.form_message').html(response);
           }
       });

    })
})
