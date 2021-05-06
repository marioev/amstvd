$(document).on("ready",inicio);
function inicio(){
    var filtro = document.getElementById('filtrar').value;
   tabla_asociado(filtro);
}

function validar(e,opcion) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){ 
     	if (opcion==1){
            var filtro = document.getElementById('filtrar').value;
            tabla_asociado(filtro);
        }
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
            if (registros != null){
                var n = registros.length;
                html = "";
                for (var i = 0; i < n ; i++){
                html += "<tr>";
                html += "<td>"+(i+1)+"</td>";
                html += "<td>";
                html += "<div id='horizontal'>";
                if (registros[i]["asociado_foto"] != null && registros[i]["asociado_foto"] != ""){
                    html += "<div id='contieneimg'>";
                    var mimagen = "thumb_"+registros[i]["asociado_foto"];
                    html += "<a class='btn btn-xs' onclick='mostrarimagen("+registros[i]["asociado_foto"]+")' style='padding: 0px;'>";
                    html += "<img src='"+base_url+"resources/images/asociados/"+mimagen+"' />";
                    html += "</a>";
                    html += "</div>";
                }else{
                    html += "<div id='contieneimg'>";
                    html += "<img src='"+base_url+"resources/images/asociados/thumb_default.jpg' />";
                    html += "</div>";
                }
                html += "<div style='padding-left: 4px'>";
                html += "<b>"+registros[i]["sociado_apellido"]+"</b><br>";
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
                html += "<td><b>Dir.:</b> "+registros[i]["asociado_direccion"]+"</br>";
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
