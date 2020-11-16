function ensenarForm() {
    reset();
    $('#formulario').show();
}

function anadirPregunta() {
    var form = $('#fquestion')[0];
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "../php/AddQuestionWithImage.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function(data){
            document.getElementById("preguntas").innerHTML=data;
            visualizarTabla();
        },
        error: function (data) {
            $("#preguntas").html="ERROR AL INSERTAR";
        }
    });
}