
function contarpreguntas(correo){
    var total = 0;
    var usuario = 0;
    var url= window.location.href;
    var correo = correo ;
    console.log(correo);
    $.ajax({
        type: "GET",
        url:"../xml/Questions.xml",
        dataType: "xml",
        async: false,
        cache: false,
        success: function(xml){
            $(xml).find("assessmentItem").each(function(){
            var autor = $(this).attr('author');
            if(correo==autor){
                usuario = usuario + 1;
            }
                total = total + 1;
        });
            $('#preguntasTOTAL').empty();
            $('#preguntasTOTAL').append("<a>"+usuario+"</a> / <a>"+total+"</a>");
    }
        
    });   
}