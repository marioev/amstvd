$(document).on("ready",inicio);
function inicio(){
    //var filtro = document.getElementById('filtrar').value;
   tabla_aportehistorial();
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscaraporte(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        //var filtro = document.getElementById('filtrar').value;
        tabla_aportehistorial();
    }
}

/* mostrar historial de aportes de un asociado */
function tabla_aportehistorial(){
    var base_url = document.getElementById('base_url').value;
    var asociado_id = document.getElementById('asociado_id').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var tipoaporte_id = document.getElementById('tipoaporte_id').value;
    var controlador = base_url+'aporte_asociado/buscar_historial';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id, gestion_id:gestion_id, tipoaporte_id:tipoaporte_id},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                var n = registros.length;
                $("#numeroreg").html(n);
                if(n == ""){
                    document.getElementById('loader').style.display = 'none';
                    alert("El asociado no tiene historial de aportes");
                }else{
                    var totalaporte = Number(0);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        totalaporte += Number(registros[i]["aporteasoc_cobrado"]);
                        html += "<tr>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["aporte_nombre"]+"</td>";
                        html += "<td>"+registros[i]["pagado_numrecibo"]+"</td>";
                        html += "<td>"+registros[i]["tipoaporte_nombre"]+"</td>";
                        html += "<td>"+registros[i]["gestion_nombre"]+"</td>";
                        html += "<td class='text-right'>"+Number(registros[i]["aporteasoc_cobrado"]).toFixed(2)+"</td>";
                        html += "</tr>";
                    }
                    html += "<tr style='font-size: 11pt'>";
                    html += "<td colspan='5' class='text-right' style='padding: 0; vertical-align: central'><b>TOTAL APORTES:</b></td>";
                    html += "<td colspan='1' class='text-right' style='padding: 0'><b>"+Number(totalaporte).toFixed(2)+"</b></td>";
                    html += "</tr>";
                    
                    $("#listaaportes").html(html);
                    document.getElementById('loader').style.display = 'none';
                }
            }else{
                alert(asociado_nombre+" no tiene aportes pendientes");
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
