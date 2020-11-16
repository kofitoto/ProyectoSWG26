$(document).ready(function(){   
    setInterval(contarpreguntas,5000);
});

function contarpreguntas(){
    var total = 0;
    var usuario = 0;
    var url= window.location.href;
    var correo = url.split('logInMail=')[1];
    $.ajax({
        type: "GET",
        url:"../xml/Questions.xml",
        dataType: "xml",
        async: false,
        cache: false,
        success: function(xml){
            $(xml).find("assessmentItem").each(function(){
            autor = $(this).attr('author');
            if(correo.valueOf()==autor.valueOf()){
                usuario = usuario + 1;
            }
                total = total + 1;
        });
            $('#preguntasTOTAL').empty();
            $('#preguntasTOTAL').append("<a>"+usuario+"</a> / <a>"+total+"</a>");
    }
        
    });   
}