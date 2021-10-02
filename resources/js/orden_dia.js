$(document).on("ready",inicio);
function inicio(){
    tabla_ordendia();
}
/* mostrar modal con imagen */
function mostrarnuevomodalorden(){
    $("#mensaje_nombre").html("");
    $("#ordendia_nombre").val("");
    $('#modalnuevaorden').on('shown.bs.modal', function (e) {
       $('#ordendia_nombre').focus();
    });
    $("#modalnuevaorden").modal('show');
}

function registrar_ordendia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id = document.getElementById('reunion_id').value;
    var ordendia_nombre = document.getElementById('ordendia_nombre').value;
    var controlador = base_url+'orden_dia/registrar_ordendia';
    if(ordendia_nombre.trim() == ""){
        $("#mensaje_nombre").html("Este campo no puede estar vacio!.");
    }else{
    document.getElementById('loader2').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{reunion_id:reunion_id, ordendia_nombre:ordendia_nombre},
                success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader2').style.display = 'none';
                    $("#modalnuevaorden").modal('hide');
                    tabla_ordendia();
                }
                },
                error:function(respuesta){

                },
                complete: function (jqXHR, textStatus) {
                    document.getElementById('loader2').style.display = 'none'; //ocultar el bloque del loader 
                    //tabla_inventario();
                }		
            });
        }
}
/* muestra ordenes del dia de una reunion */
function tabla_ordendia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id = document.getElementById('reunion_id').value;
    var controlador = base_url+'orden_dia/buscar_ordendia';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{reunion_id:reunion_id},
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
                html += "<span style='font-size: 10pt'><b>"+registros[i]["ordendia_nombre"]+"</b></span>";
                html += "</td>";
                html += "<td>";
                if(registros[i]["ordendia_texto"] != null){
                    var texto = registros[i]["ordendia_texto"];
                    parte_texto = texto.substr(0, 50);
                    html+= parte_texto+"...";
                }
                html += "</td>";
                html += "<td class='text-center'>"+moment(registros[i]["ordendia_fechahora"]).format("DD/MM/YYYY HH:mm:ss")+"</td>";
                html += "<td class='text-center'>";
                html += "<a class='btn btn-info btn-xs' href='"+base_url+"reunion/edit/"+registros[i]["reunion_id"]+"' target='_blank' title='Modificar información' ><span class='fa fa-pencil'></span></a>";
                html += "<a class='btn btn-success btn-xs' href='"+base_url+"orden_dia/nuevareunion/"+registros[i]["reunion_id"]+"' title='Orden del día' ><span class='fa fa-file-text-o'></span></a>";
                html += "</td>";
                html += "</tr>";
            }
                $("#listaordendia").html(html);
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