$(document).on("ready",inicio);
function inicio(){
    tabla_asistencia();
}
/* mostrar modal nuevo orden */
function mostrarnuevomodalcontrol(){
    /*$("#mensaje_nombre").html("");
    $("#ordendia_nombre").val("");
    $("#ordendia_asistencia").prop('checked', false);
    $('#modalnuevaorden').on('shown.bs.modal', function (e) {
       $('#ordendia_nombre').focus();
    });*/
    let allestado = JSON.parse(document.getElementById('all_estado').value);
    let m = allestado.length;
    let html = "<select name='asistencia_estado' id='asistencia_estado' class='form-control'>";
    var selected = "";
    for (var j = 0; j < m; j++){
        /*if(allestado[j]["estado_nombre"] == registros[i]["asistencia_estado"]){
            selected = "selected='selected'";
        }else{
            selected = "";
        }*/
        html += "<option value='"+allestado[j]["estado_nombre"]+"' "+selected+">"+allestado[j]["estado_nombre"]+"</option>";
    }
    html += "</select>";
    let date = new Date()
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    if(month < 10){
      month = `0${month}`;
    }
    if(day < 10){
      day = `0${day}`;
    }
    fecha = `${year}-${month}-${day}`;
    //let hora = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    let hora = date.getHours();
    let min  = date.getMinutes();
    let seg  = date.getSeconds();
    if(hora<10){
        hora = `0${hora}`;
    }
    if(min<10){
        min = `0${min}`;
    }
    if(seg<10){
        seg = `0${seg}`;
    }
    lahora = `${hora}:${min}:${seg}`;
    $("#asistencia_fecha").val(fecha);
    $("#asistencia_hora").val(lahora);
    $("#paraestado").html(html);
    $("#modalnuevocontrol").modal('show');
}

function generar_asistencia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id  = document.getElementById('reunion_id').value;
    var ordendia_id = document.getElementById('ordendia_id').value;
    var asistencia_fecha  = document.getElementById('asistencia_fecha').value;
    var asistencia_hora   = document.getElementById('asistencia_hora').value;
    var asistencia_estado = document.getElementById('asistencia_estado').value;
    var controlador = base_url+'asistencia/registrar_asistencia';  
    document.getElementById('loader2').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{reunion_id:reunion_id, ordendia_id:ordendia_id, asistencia_fecha:asistencia_fecha,
                      asistencia_hora:asistencia_hora, asistencia_estado:asistencia_estado},
                success:function(respuesta){
                    var registros = JSON.parse(respuesta);
                    if (registros != null){
                        document.getElementById('loader2').style.display = 'none';
                        $("#modalnuevocontrol").modal('hide');
                        tabla_asistencia();
                    }
                },
                error:function(respuesta){
                    
                },
                complete: function (jqXHR, textStatus) {
                    document.getElementById('loader2').style.display = 'none'; //ocultar el bloque del loader 
                }
            });
}
/* muestra la asistencia de una reunion */
function tabla_asistencia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id = document.getElementById('reunion_id').value;
    var ordendia_id = document.getElementById('ordendia_id').value;
    var controlador = base_url+'asistencia/get_asistencia';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{reunion_id:reunion_id, ordendia_id:ordendia_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            $("#numeroreg").html(0);
            if (registros != null){
                var allestado = JSON.parse(document.getElementById('all_estado').value);
                var m = allestado.length;
                var n = registros.length;
                $("#numeroreg").html(n);
                if(n > 0){
                    $("#esparanuevaasistencia").css("display", "none");
                }else{
                    $("#esparanuevaasistencia").css("display", "block");
                }
                let totalpresentes = Number(0);
                let totalpermisos  = Number(0);
                let totalfaltas    = Number(0);
                let total          = Number(0);
                html = "";
                for (var i = 0; i < n ; i++){
                    total += 1;
                    if(registros[i]["asistencia_estado"] == "PRESENTE" || registros[i]["asistencia_estado"] == "RETRASO PAGADO" || registros[i]["asistencia_estado"] == "RETRASO SIN PAGAR"){
                        totalpresentes += 1;
                    }else if(registros[i]["asistencia_estado"] == "PERMISO"){
                        totalpermisos += 1;
                    }else if(registros[i]["asistencia_estado"] == "FALTA"){
                        totalfaltas += 1;
                    }
                html += "<tr>";
                html += "<td class='text-center'>"+(i+1)+"</td>";
                html += "<td>";
                html += "<span style='font-size: 10pt'><b>"+registros[i]["asociado_apellido"]+" "+registros[i]["asociado_nombre"]+"</b></span>";
                html += "</td>";
                html += "<td class='text-center'>";
                html += "<b>"+registros[i]["asistencia_estado"]+"</b>";
                html += "</td>";
                html += "<td class='text-center'>";
                html += "<select name='laasistencia"+registros[i]["asistencia_id"]+"' id='laasistencia"+registros[i]["asistencia_id"]+"' class='form-control' onchange='cambiar_asistencia("+registros[i]["asistencia_id"]+")'>";
                var selected = "";
                    for (var j = 0; j < m; j++) {
                        //$selected = ($reunion['reunion_id'] == $asistencia['reunion_id']) ? ' selected="selected"' : "";
                        if(allestado[j]["estado_nombre"] == registros[i]["asistencia_estado"]){
                            selected = "selected='selected'";
                        }else{
                            selected = "";
                        }
                        html += "<option value='"+allestado[j]["estado_nombre"]+"' "+selected+">"+allestado[j]["estado_nombre"]+"</option>";
                    }
                    /*html += "<option value='RETRASO'>RETRASO</option>";
                    html += "<option value='PERMISO'>PERMISO</option>";
                    html += "<option value='FALTA'>FALTA</option>";*/
                html += "</select>";
                html += "</td>";
                //html += "<td class='text-center'>"+moment(registros[i]["ordendia_fechahora"]).format("DD/MM/YYYY HH:mm:ss")+"</td>";
                /*html += "<td class='text-center'>";
                if(estadoreunion_id == 6){
                    html += "<a onclick='mostrarmodalmodificarorden("+JSON.stringify(registros[i])+")' class='btn btn-info btn-xs' target='_blank' title='Modificar información' ><span class='fa fa-pencil'></span></a>";
                    if(registros[i]["ordendia_asistencia"] == 1){
                        html += "<a class='btn btn-success btn-xs' href='"+base_url+"asistencia/control/"+registros[i]["reunion_id"]+"/"+registros[i]["ordendia_id"]+"' title='Control de Asistencia' ><span class='fa fa-file-text-o'></span></a>";
                    }else{
                        html += "<a onclick='mostrarmodalcontenidorden("+JSON.stringify(registros[i])+")' class='btn btn-success btn-xs' title='Registrar contenido' ><span class='fa fa-file-text-o'></span></a>";
                    }
                    html += "<a onclick='mostrarmodaleliminarunorden("+JSON.stringify(registros[i])+")' class='btn btn-danger btn-xs' title='Eliminar orden' ><span class='fa fa-trash'></span></a>";
                }
                html += "</td>";
                */
                html += "</tr>";
            }
            html += "<tr>";
            html += "<th colspan='4'>Resumen</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<td colspan='2' class='text-right'>Presentes:</td>";
            html += "<td colspan='2' class='text-lefth text-bold'>"+totalpresentes+"</td>";
            html += "</tr>";
            html += "<tr>";
            html += "<td colspan='2' class='text-right'>Permisos:</td>";
            html += "<td colspan='2' class='text-lefth text-bold'>"+totalpermisos+"</td>";
            html += "</tr>";
            html += "<tr>";
            html += "<td colspan='2' class='text-right'>Faltas:</td>";
            html += "<td colspan='2' class='text-lefth text-bold'>"+totalfaltas+"</td>";
            html += "</tr>";
            html += "<tr>";
            html += "<td colspan='2' class='text-right text-bold'>Total:</td>";
            html += "<td colspan='2' class='text-lefth text-bold'>"+total+"</td>";
            html += "</tr>";
                $("#listaordendia").html(html);
                document.getElementById('loader').style.display = 'none';
            }else{
                document.getElementById('esparanuevaasistencia').style.display = 'block';
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

function cambiar_asistencia(asistencia_id){
    var base_url = document.getElementById('base_url').value;
    var laasistencia = document.getElementById('laasistencia'+asistencia_id).value;
    var controlador = base_url+'asistencia/modificar_asistencia';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{asistencia_id:asistencia_id,laasistencia:laasistencia},
                success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader').style.display = 'none';
                    tabla_asistencia();
                }
                },
                error:function(respuesta){

                },
                complete: function (jqXHR, textStatus) {
                    document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                    //tabla_inventario();
                }		
            });
       // }
}
/* guarda la multa de los que no asistieron a una reunion!. */
function guardar_asistencia(){
    var base_url = document.getElementById('base_url').value;
    var ordendia_id = document.getElementById('ordendia_id').value;
    var controlador = base_url+'asistencia/guardar_asistenciamulta';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{ordendia_id:ordendia_id},
                success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if (registros != null){
                    document.getElementById('loader').style.display = 'none';
                    tabla_asistencia();
                }
                },
                error:function(respuesta){

                },
                complete: function (jqXHR, textStatus) {
                    document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                    //tabla_inventario();
                }		
            });
       // }
}
