$(document).on("ready",inicio);
function inicio(){
    var filtro = document.getElementById('filtrar').value;
   tabla_usuario(filtro);
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscarusuario(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        var filtro = document.getElementById('filtrar').value;
        tabla_usuario(filtro);
    }
}
function tabla_usuario(filtro){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'usuario/buscar_usuarios';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{filtro:filtro},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            $("#numeroreg").html(0);
            if (registros != null){
                var n = registros.length;
                $("#numeroreg").html(n);
                html = "";
                for (var i = 0; i < n ; i++){
                    html += "<tr>";
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>";
                    html += "<div id='horizontal'>";
                    if (registros[i]["usuario_imagen"] != null && registros[i]["usuario_imagen"] != ""){
                        html += "<div id='contieneimg'>";
                        var mimagen = "thumb_"+registros[i]["usuario_imagen"];
                        html += "<a class='btn btn-xs' onclick='mostrarimagen("+JSON.stringify(registros[i]["usuario_imagen"])+", "+JSON.stringify(registros[i]["usuario_nombre"])+")' style='padding: 0px;'>";
                        html += "<img src='"+base_url+"resources/images/usuarios/"+mimagen+"' />";
                        html += "</a>";
                        html += "</div>";
                    }else{
                        html += "<div id='contieneimg'>";
                        html += "<img src='"+base_url+"resources/images/usuarios/thumb_usuario.jpg' />";
                        html += "</div>";
                    }
                    html += "<div style='padding-left: 4px'>";
                    html += "<span style='font-size: 12pt'><b>"+registros[i]["usuario_nombre"]+"</b></span><br>";
                    html += "<b>"+registros[i]["tipousuario_nombre"]+"</b>";
                    html += "</div>";
                    html += "</div>";
                    html += "</td>";
                    html += "<td>"+registros[i]["usuario_email"]+"</td>";
                    html += "<td class='text-center'><span style='font-size:10pt'><b>"+registros[i]["usuario_login"]+"</b></span></td>";
                    html += "<td class='text-center'>"+registros[i]["estado_nombre"]+"</td>";
                    
                    html += "<td>";
                    html += "<a class='btn btn-info btn-xs' href='"+base_url+"usuario/edit/"+registros[i]["usuario_id"]+"' target='_blank' title='Modificar información' ><span class='fa fa-pencil'></span></a>";
                    if(registros[i]["estado_id"] == 1){
                        html += "<a class='btn btn-dark btn-xs' onclick='modalrestablecer("+JSON.stringify(registros[i]["usuario_nombre"])+", "+registros[i]["usuario_id"]+")' target='_blank' title='Cambiar contraseña' ><span class='fa fa-gear'></span></a>";
                        html += "<a class='btn btn-danger btn-xs' onclick='modaldardebaja("+JSON.stringify(registros[i]["usuario_nombre"])+", "+registros[i]["usuario_id"]+")' title='Dar de baja al usuario' ><span class='fa fa-trash'></span></a>";
                    }else{
                        html += "<a class='btn btn-warning btn-xs' onclick='modaldardealta("+JSON.stringify(registros[i]["usuario_nombre"])+", "+registros[i]["usuario_id"]+")' title='Dar de alta al usuario' ><span class='fa fa-undo'></span></a>";
                    }
                    html += "</td>";

                    html += "</tr>";
                }
                $("#listausuarios").html(html);
                document.getElementById('loader').style.display = 'none';
            }
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }		
        });
}
/* mostrar modal con imagen */
function mostrarimagen(imagen, usuario_nombre){
    var base_url = document.getElementById('base_url').value;
    laimg = "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/usuarios/"+imagen+"' />";
    $("#elusuario").html(usuario_nombre);
    $("#imagenusuario").html(laimg);
    $("#modalimagenusuario").modal('show');
}
/* mostrar modal para confirmar si se da de baja al usuario */
function modaldardebaja(usuario_nombre, usuario_id){
    $("#elusuarioactual").val(usuario_id);
    $("#elusuariobaja").html(usuario_nombre);
    $("#modaldardebajausuario").modal('show');
}
/* da de baja a un usuario */
function dardebajausuario(){
    var base_url = document.getElementById('base_url').value;
    var usuario_id = document.getElementById('elusuarioactual').value;
    var controlador = base_url+'usuario/dardebaja_usuario';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{usuario_id:usuario_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modaldardebajausuario").modal('hide');
                tabla_usuario(filtro);
                document.getElementById('loader').style.display = 'none';
            }
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }		
        });
}
/* mostrar modal para confirmar si se da de alta al usuario */
function modaldardealta(usuario_nombre, usuario_id){
    $("#elusuarioactual").val(usuario_id);
    $("#elusuarioalta").html(usuario_nombre);
    $("#modaldardealtausuario").modal('show');
}
/* da de alta a un usuario */
function dardealtausuario(){
    var base_url = document.getElementById('base_url').value;
    var usuario_id = document.getElementById('elusuarioactual').value;
    var controlador = base_url+'usuario/dardealta_usuario';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{usuario_id:usuario_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modaldardealtausuario").modal('hide');
                tabla_usuario(filtro);
                document.getElementById('loader').style.display = 'none';
            }
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }		
        });
}
/* mostrar modal para cambiar contraseña de un usuario */
function modalrestablecer(usuario_nombre, usuario_id){
    $("#elusuarioactual").val(usuario_id);
    $("#elusuariocambiar").html(usuario_nombre);
    $("#mensajecambiarcontrasenia").html("");
    $('#rusuario_clave').val("");
    $('#usuario_clave').val("");
    $('#modalrestablecerusuario').on('shown.bs.modal', function() {
        $('#usuario_clave').focus();
    });
    $("#modalrestablecerusuario").modal('show');
}
/* restablece el ingreso de un usuario al sistema */
function restableceringresousuario(){
    var usuario_id = document.getElementById('elusuarioactual').value;
    var usuario_clave = document.getElementById('usuario_clave').value;
    var rusuario_clave = document.getElementById('rusuario_clave').value;
    if(!(usuario_clave === rusuario_clave)){
        $("#mensajecambiarcontrasenia").html("<span class='fa fa-close'></span> Las contraseñas no son iguales, por favor vuelva a intentar!.");
    }else{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'usuario/registrar_nuevacontrasenia';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{usuario_id:usuario_id, usuario_clave:usuario_clave},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modalrestablecerusuario").modal('hide');
                $("#mensajeusuario").html('Contraseña modificada con exito!.');
                $('#bloquemensajeusuario').css("display", "block");
                tabla_usuario(filtro);
                document.getElementById('loader').style.display = 'none';
            }
            },
            error:function(respuesta){

            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }		
        });
    }
}