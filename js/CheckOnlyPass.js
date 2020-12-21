$(document).ready(function () {
    
    var pass = false;
    var samePass = false;

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
                    $('#gestion').html('<h3>La contraseña es valida</h3>');
                }else
                {
                    pass = false;
                    $('#gestion').html('<h3>La contraseña no es valida</h3>');
                }
                comprobar(pass,samePass);
            }
        });
    });

    $('#pass2').blur(function(){
        if($('#pass1').val()!=$('#pass2').val()){
            samePass = false;
            comprobar(pass,samePass);
            $('#gestion').html('<h4>Las contraseñas no coinciden.</h4>');
        }else{
            samePass = true;
            comprobar(pass,samePass);
            $('#gestion').empty();
        }
    });

    $('#enviar').click(function(e){
        e.preventDefault();
        var frm = $('#form');
        var datos = frm.serialize();

        $.ajax({
            type: 'POST',
            url: '../php/UpdatePassword.php',
            async: false,
            cache: false,
            data: datos,
            success: function(data){
                $('#resul').html(data);
            }
        });
    });

});

function comprobar(pass, samePass){
    if(pass && samePass){
    $("#enviar").prop('disabled', false);
}else{
    $("#enviar").prop('disabled', true);
}
}