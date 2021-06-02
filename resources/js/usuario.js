$(document).on("ready",inicio);
function inicio(){
    var filtro = document.getElementById('filtrar').value;
   tabla_asociado(filtro);
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscarasociado(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        var filtro = document.getElementById('filtrar').value;
        tabla_asociado(filtro);
    }
}
function tabla_asociado(filtro){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'asociado/buscar_asociados';
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
                if (registros[i]["asociado_foto"] != null && registros[i]["asociado_foto"] != ""){
                    html += "<div id='contieneimg'>";
                    var mimagen = "thumb_"+registros[i]["asociado_foto"];
                    html += "<a class='btn btn-xs' onclick='mostrarimagen("+JSON.stringify(registros[i]["asociado_foto"])+", "+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+")' style='padding: 0px;'>";
                    html += "<img src='"+base_url+"resources/images/asociados/"+mimagen+"' />";
                    html += "</a>";
                    html += "</div>";
                }else{
                    html += "<div id='contieneimg'>";
                    html += "<img src='"+base_url+"resources/images/asociados/thumb_default.jpg' />";
                    html += "</div>";
                }
                html += "<div style='padding-left: 4px'>";
                html += "<b>"+registros[i]["asociado_apellido"]+"</b><br>";
                html += "<b>"+registros[i]["asociado_nombre"]+"</b><br>";
                html += "<b>Cod.:</b> "+registros[i]["asociado_codigo"];
                html += "</div>";
                html += "</div>";
                html += "</td>";
                html += "<td>"+registros[i]["estadocivil_nombre"]+"<br>";
                html += registros[i]["genero_nombre"]+"<br>";
                html += "<b>C.I.:</b> "+registros[i]["asociado_ci"];
                html += " "+registros[i]["expedido_nombre"];
                html += "</td>			";
                html += "<td align='center'>";
                if(registros[i]["asociado_fechanac"] != '0000-00-00'){
                    html += moment(registros[i]["asociado_fechanac"]).format("DD/MM/YYYY");
                    html += "</br>";
                    var hoy = new Date();
                    var cumpleanios = new Date(registros[i]["asociado_fechanac"]);
                    var edad = hoy.getFullYear() - cumpleanios.getFullYear();
                    var m = hoy.getMonth() - cumpleanios.getMonth();
                    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanios.getDate())) {
                        edad--;
                    }
                    html += "("+edad+")";
                }
                html += "</td>";
                html += "<td><b>Dir.:</b> "+registros[i]["asociado_direccion"];
                var asociado_telef = "";
                var asociado_celu = "";
                var guion = "";
                var nomtelef = "";
                if((registros[i]["asociado_telefono"] != "") && (registros[i]["asociado_telefono"] != null) && (registros[i]["asociado_celular"] != "") && (registros[i]["asociado_celular"] != null))
                {
                    guion = "-";
                    nomtelef = "<br>Telef.: ";
                }
                if(registros[i]["asociado_telefono"] != null && registros[i]["asociado_telefono"] != ""){
                    asociado_telef = registros[i]["asociado_telefono"];
                    nomtelef = "<br>Telef.: ";
                }
                if(registros[i]["asociado_celular"] != null && registros[i]["asociado_celular"] != ""){
                    asociado_celu = registros[i]["asociado_celular"];
                    nomtelef = "<br>Telef.: ";
                }
                html += nomtelef+asociado_telef+guion+asociado_celu;
                html += "</td>";
                html += "<td>"+registros[i]["asociado_email"]+"</td>";
                html += "<td>"+registros[i]["estado_nombre"];
                html += "</td>";
                html += "<td>";
                html += "<a class='btn btn-info btn-xs' href='"+base_url+"asociado/edit/"+registros[i]["asociado_id"]+"' target='_blank' title='Modificar información' ><span class='fa fa-pencil'></span></a>";
                if(registros[i]["estado_id"] == 1){
                    html += "<a class='btn btn-dark btn-xs' onclick='modalrestablecer("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+JSON.stringify(registros[i]["asociado_ci"])+", "+registros[i]["asociado_id"]+")' target='_blank' title='Restablecer accesos al sistema' ><span class='fa fa-gear'></span></a>";
                    html += "<a class='btn btn-danger btn-xs' onclick='modaldardebaja("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+registros[i]["asociado_id"]+")' title='Dar de baja al asociado' ><span class='fa fa-trash'></span></a>";
                }else{
                    html += "<a class='btn btn-warning btn-xs' onclick='modaldardealta("+JSON.stringify(registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"])+", "+registros[i]["asociado_id"]+")' title='Dar de alta al asociado' ><span class='fa fa-undo'></span></a>";
                }
                html += "</td>";
                
                html += "</tr>";
            }
                $("#listasocios").html(html);
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
                tabla_asociado(filtro);
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
                tabla_asociado(filtro);
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
                tabla_asociado(filtro);
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