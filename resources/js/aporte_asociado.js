$(document).on("ready",inicio);
function inicio(){
    //var filtro = document.getElementById('filtrar').value;
   tabla_aporteasociado();
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscaraporte(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        //var filtro = document.getElementById('filtrar').value;
        tabla_aporteasociado();
    }
}
function tabla_aporteasociado(){
    var base_url = document.getElementById('base_url').value;
    var filtro = document.getElementById('filtrar').value;
    //var gestion_id = document.getElementById('gestion_id').value;
    //var tipoaporte_id = document.getElementById('tipoaporte_id').value;
    var controlador = base_url+'asociado/buscar_asociadosactivos';
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
                html += "<td class='text-center'>"+(i+1)+"</td>";
                html += "<td>"+registros[i]["asociado_apellido"]+"</td>";
                html += "<td>"+registros[i]["asociado_nombre"]+"</td>";
                html += "<td>";
                html += "<a class='btn btn-success btn-xs' onclick='modalmostardeudas("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+registros[i]["asociado_id"]+")' title='Mostrar deudas' ><span class='fa fa-dollar'></span></a>";
                html += "</td>";
                html += "</tr>";
            }
                $("#listaaporteasociados").html(html);
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
/* mostrar modal para ver las deudas de un asociado  */
function modalmostardeudas(asociado_nombre, asociado_id){
    $("#elasociadoactual").val(asociado_id);
    $("#elasociadonombre").html(asociado_nombre);
    var base_url = document.getElementById('base_url').value;
    //var asociado_id = document.getElementById('elasociadoactual').value;
    var controlador = base_url+'aporte_asociado/buscar_deudas';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var n = registros.length;
                html = "";
                for (var i = 0; i < n ; i++){
                    html += "<tr>";
                    html += "<td class='text-center'>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["aporte_nombre"]+"</td>";
                    html += "<td>"+registros[i]["tipoaporte_nombre"]+"</td>";
                    html += "<td>"+registros[i]["gestion_nombre"]+"</td>";
                    html += "<td>"+registros[i]["aporteasoc_acobrar"]+"</td>";
                    html += "<td>";
                    html += "<input type='checkbox' name='checkpagar[]' class='form-control' id='pagaraporte"+registros[i]["aporteasoc_id"]+"' />";
                    html += "</td>";
                    html += "</tr>";
                }
                //var filtro = document.getElementById('filtrar').value;
                //$("#modaldardebajaasociado").modal('hide');
                $("#listadedeudas").html(html);
                //tabla_aporteasociado(filtro);
                $("#modalmostrardeuda").modal('show');
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
                tabla_aporteasociado(filtro);
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
                tabla_aporteasociado(filtro);
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
                tabla_aporteasociado(filtro);
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