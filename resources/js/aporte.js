$(document).on("ready",inicio);
function inicio(){
    //var filtro = document.getElementById('filtrar').value;
   tabla_aporte();
}

/* si la tecla enter es apretado; procede con la busqueda */
function buscaraporte(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        //var filtro = document.getElementById('filtrar').value;
        tabla_aporte();
    }
}
function tabla_aporte(){
    var base_url = document.getElementById('base_url').value;
    var filtro = document.getElementById('filtrar').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var tipoaporte_id = document.getElementById('tipoaporte_id').value;
    var controlador = base_url+'aporte/buscar_aportes';
    document.getElementById('loader').style.display = 'block'; //muestra el loader
    $.ajax({url:controlador,
            type:"POST",
            data:{filtro:filtro, gestion_id:gestion_id, tipoaporte_id:tipoaporte_id},
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
                html += "<td>"+registros[i]["aporte_nombre"]+"</td>";
                html += "<td>"+registros[i]["gestion_nombre"]+"</td>";
                html += "<td>"+registros[i]["tipoaporte_nombre"]+"</td>";
                html += "<td class='text-right'>"+Number(registros[i]["aporte_monto"]).toFixed(2)+"</td>";
                html += "<td>"+registros[i]["aporte_obs"]+"</td>";
                html += "<td class='text-center'>"+registros[i]["estado_nombre"]+"</td>";
                html += "</tr>";
            }
                $("#listaaportes").html(html);
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
