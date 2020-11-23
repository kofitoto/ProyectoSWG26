$(document).ready(function(){
    var pass = false;
    var email = false;
    $('#dirCorreo').blur(function(){
        $.ajax({
            type: 'GET',
            url: '../php/ClientVerifyEnrollment.php?dirCorreo='+$('#dirCorreo').val(),
            async: false,
            cache: false,
            success: function(data){
                if(data === "SI")
                {
                    email = true;
                     $('#vip').html('<h3>El email es VIP</h3>');
                }else
                {
                    email = false;
                    $('#vip').html('<h3>El email no es VIP</h3>');
                }
                comprobar(email, pass);
            }
        });
    });
    
    $('#pass1').blur(function(){
        $.ajax({
            type: 'GET',
            url: '../php/ClientVerifyPassWS.php?pass1='+$('#pass1').val(),
            async: false,
            cache: false,
            success: function(data){
                if(data === "VALIDA")
                {
                    pass = true;
                     $('#vip').html('<h3>La contraseña es valida</h3>');
                }else
                {
                    pass = false;
                    $('#vip').html('<h3>La contraseña no es valida</h3>');
                }
                comprobar(email, pass);
            }
        });
    });
});
function comprobar(email, pass){
        if(email && pass){
        $("#submit").prop('disabled', false);
    }else{
        $("#submit").prop('disabled', true);
    }
}