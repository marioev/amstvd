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
                        html += "<a class='btn btn-dark btn-xs' onclick='modalrestablecer("+JSON.stringify(registros[i]["usuario_nombre"])+", "+JSON.stringify(registros[i]["usuario_id"])+", "+registros[i]["usuario_id"]+")' target='_blank' title='Cambiar contraseña' ><span class='fa fa-gear'></span></a>";
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
function mostrarimagen(imagen, asociado){
    var base_url = document.getElementById('base_url').value;
    laimg = "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/asociados/"+imagen+"' />";
    $("#elasociado").html(asociado);
    $("#imagenasociado").html(laimg);
    $("#modalimagenasociado").modal('show');
}
/* mostrar modal para confirmar si se da de baja al asociado */
function modaldardebaja(asociado_nombre, asociado_id){
    $("#elasociadoactual").val(asociado_id);
    $("#elasociadobaja").html(asociado_nombre);
    $("#modaldardebajaasociado").modal('show');
}
/* da de baja a un asociado */
function dardebaja(){
    var base_url = document.getElementById('base_url').value;
    var asociado_id = document.getElementById('elasociadoactual').value;
    var controlador = base_url+'asociado/dardebaja_asociado';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modaldardebajaasociado").modal('hide');
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
/* mostrar modal para confirmar si se da de alta al asociado */
function modaldardealta(asociado_nombre, asociado_id){
    $("#elasociadoactual").val(asociado_id);
    $("#elasociadoalta").html(asociado_nombre);
    $("#modaldardealtaasociado").modal('show');
}
/* da de alta a un asociado */
function dardealta(){
    var base_url = document.getElementById('base_url').value;
    var asociado_id = document.getElementById('elasociadoactual').value;
    var controlador = base_url+'asociado/dardealta_asociado';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modaldardealtaasociado").modal('hide');
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
/* mostrar modal para confirmar solicitud de restablecer acceso del asociado al sistema */
function modalrestablecer(asociado_nombre, asociado_ci, asociado_id){
    $("#elasociadoactual").val(asociado_id);
    $("#elasociadoactualci").val(asociado_ci);
    $("#elasociadorestablecer").html(asociado_nombre);
    $("#modalrestablecerasociado").modal('show');
}
/* restablece el ingreso de un asociado al sistema */
function restableceringreso(){
    var base_url = document.getElementById('base_url').value;
    var asociado_id = document.getElementById('elasociadoactual').value;
    var asociado_ci = document.getElementById('elasociadoactualci').value;
    var controlador = base_url+'asociado/restablecer_asociado';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id, asociado_ci:asociado_ci},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var filtro = document.getElementById('filtrar').value;
                $("#modalrestablecerasociado").modal('hide');
                alert("Se restablecio el acceso al sistema correctamente");
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