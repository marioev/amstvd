$(document).on("ready",inicio);
function inicio(){
    var filtro = document.getElementById('filtrar').value;
   tabla_reunion(filtro);
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscar_reunion(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        var filtro = document.getElementById('filtrar').value;
        tabla_reunion(filtro);
    }
}
function tabla_reunion(filtro){
    var base_url = document.getElementById('base_url').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var tiporeunion_id = document.getElementById('tiporeunion_id').value;
    var controlador = base_url+'reunion/buscar_reunion';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{filtro:filtro, gestion_id:gestion_id, tiporeunion_id:tiporeunion_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            $("#numeroreg").html(0);
            if (registros != null){
                var n = registros.length;
                $("#numeroreg").html(n);
                html = "";
                for (var i = 0; i < n ; i++){
                html += "<tr>";
                html += "<td class='text-center'>"+(i+1)+"</td>";
                html += "<td>";
                html += "<span style='font-size: 10pt'><b>"+registros[i]["tiporeunion_nombre"]+"</b></span>";
                html += "</td>";
                html += "<td>"+registros[i]["gestion_nombre"]+"</td>";
                html += "<td class='text-center'>"+moment(registros[i]["reunion_fecha"]).format("DD/MM/YYYY")+"</td>";
                html += "<td class='text-center'>"+registros[i]["reunion_inicio"]+"</td>";
                html += "<td class='text-center'>"+registros[i]["reunion_tolerancia"]+"</td>";
                html += "<td class='text-center'>";
                if(registros[i]["reunion_fin"] != "" && registros[i]["reunion_fin"] != null){
                    html += registros[i]["reunion_fin"];
                }
                html += "</td>";
                html += "<td class='text-center'>"+registros[i]["estado_nombre"]+"</td>";
                html += "<td class='text-center'>";
                html += "<a class='btn btn-info btn-xs' href='"+base_url+"reunion/edit/"+registros[i]["reunion_id"]+"' target='_blank' title='Modificar información' ><span class='fa fa-pencil'></span></a>";
                /*if(registros[i]["estado_id"] == 1){
                    html += "<a class='btn btn-dark btn-xs' onclick='modalrestablecer("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+JSON.stringify(registros[i]["asociado_ci"])+", "+registros[i]["asociado_id"]+")' target='_blank' title='Restablecer accesos al sistema' ><span class='fa fa-gear'></span></a>";
                    html += "<a class='btn btn-danger btn-xs' onclick='modaldardebaja("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+registros[i]["asociado_id"]+")' title='Dar de baja al asociado' ><span class='fa fa-trash'></span></a>";
                }else{
                    html += "<a class='btn btn-warning btn-xs' onclick='modaldardealta("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+registros[i]["asociado_id"]+")' title='Dar de alta al asociado' ><span class='fa fa-undo'></span></a>";
                }*/
                html += "</td>";
                html += "</tr>";
            }
                $("#listareuniones").html(html);
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
                tabla_reunion(filtro);
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
                tabla_reunion(filtro);
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
                tabla_reunion(filtro);
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