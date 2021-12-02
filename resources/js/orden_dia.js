$(document).on("ready",inicio);
function inicio(){
    tabla_ordendia();
}
/* mostrar modal nuevo orden */
function mostrarnuevomodalorden(){
    $("#mensaje_nombre").html("");
    $("#ordendia_nombre").val("");
    $("#ordendia_asistencia").prop('checked', false);
    $('#modalnuevaorden').on('shown.bs.modal', function (e) {
       $('#ordendia_nombre').focus();
    });
    $("#modalnuevaorden").modal('show');
}

function registrar_ordendia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id = document.getElementById('reunion_id').value;
    var ordendia_asistencia = 0;
    var ordendia_nombre = document.getElementById('ordendia_nombre').value;
    var controlador = base_url+'orden_dia/registrar_ordendia';
    if(ordendia_nombre.trim() == ""){
        $("#mensaje_nombre").html("Este campo no puede estar vacio!.");
    }else{
        if($('#ordendia_asistencia').is(':checked')){
            ordendia_asistencia = 1;
        }
    document.getElementById('loader2').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{reunion_id:reunion_id, ordendia_asistencia:ordendia_asistencia, ordendia_nombre:ordendia_nombre},
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
                if(registros[i]["ordendia_asistencia"] == 1){
                    html += "<a class='btn btn-success btn-xs' href='"+base_url+"orden_dia/nuevareunion/"+registros[i]["reunion_id"]+"' title='Orden del día' ><span class='fa fa-file-text-o'></span></a>";
                }else{
                    html += "<a onclick='mostrarmodalcontenidorden("+JSON.stringify(registros[i])+")' class='btn btn-success btn-xs' title='Registrar contenido' ><span class='fa fa-file-text-o'></span></a>";
                }
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

/* mostrar modal modificar orden */
function modificarmodalorden(){
    $("#mensaje_nombre").html("");
    $("#ordendia_nombre").val("");
    $('#modalnuevaorden').on('shown.bs.modal', function (e) {
       $('#ordendia_nombre').focus();
    });
    $("#modalnuevaorden").modal('show');
}

/* mostrar modal para registrar el contenido de el punto a tratar */
function mostrarmodalcontenidorden(ordendia){
    $("#eltitulo").html(ordendia['ordendia_nombre']);
    $("#ordendia_elid").html(ordendia['ordendia_id']);
    $('#modalcontenidorden').on('shown.bs.modal', function (e) {
       $('#ordendia_nombre').focus();
    });
    $("#modalcontenidorden").modal('show');
}
function registrar_contenidordendia(){
    var base_url = document.getElementById('base_url').value;
    var reunion_id = document.getElementById('reunion_id').value;
    var ordendia_asistencia = 0;
    var ordendia_nombre = document.getElementById('ordendia_nombre').value;
    var controlador = base_url+'orden_dia/registrar_ordendia';
    if(ordendia_nombre.trim() == ""){
        $("#mensaje_nombre").html("Este campo no puede estar vacio!.");
    }else{
        if($('#ordendia_asistencia').is(':checked')){
            ordendia_asistencia = 1;
        }
    document.getElementById('loader2').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
                type:"POST",
                data:{reunion_id:reunion_id, ordendia_asistencia:ordendia_asistencia, ordendia_nombre:ordendia_nombre},
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