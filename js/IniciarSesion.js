function cargarImagenyCorreo(img,email){
    $("#h1").append('<img width=\"50\" height=\"60\" src="data:image/gif;base64,'+img+'" />');
    $("#h1").append("<p>"+email+"</p>");
}