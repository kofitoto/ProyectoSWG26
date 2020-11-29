function EliminarUser(button){
    if (confirm("Estas seguro de que deseas eliminar el usuario?")) {
        var str = button['id'].split("_");
        
        $.ajax({
            type: 'GET',
            url: '../php/RemoveUser.php?email='+str[1],
            async: false,
            cache:false,
            success: function(){
                var row = document.getElementById(str[1]);
                row.parentNode.removeChild(row);
            }
            
        });
        
    }
}

function CambiarEstado(button){
    if (confirm("Estas seguro de que deseas cambiar el estatus del usuario?")) {
        var str = button['id'].split("_");
        
        $.ajax({
            type: 'GET',
            url: '../php/ChangeUserState.php?email='+str[1],
            async: false,
            cache:false,
            success: function(data){
                document.getElementById(str[1]).innerHTML = data;
            }
            
        });
        
    }
}