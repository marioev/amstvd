/* tambien se lo usa en reunion edit */
/*function elfocus() {
  $('#modaltiporeunion').on('shown.bs.modal', function(e) {
    $('.focus').focus();
  })
}*/
function registrarnuevotiporeunion(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var tiporeunion_nombre = document.getElementById('nuevo_tiporeunion').value;
    controlador = base_url+'tipo_reunion/nuevotipodereunion';
    if(tiporeunion_nombre.trim() == ""){
        $("#nuevo_tiporeunion").val("");
        $("#mensaje_tiporeunion").html("<br>Este campo no debe estar vacio!");
    }else{
        $('#modaltiporeunion').modal('hide');
        $.ajax({url: controlador,
                type:"POST",
                data:{tiporeunion_nombre:tiporeunion_nombre},
                success:function(respuesta){
                    var registros =  JSON.parse(respuesta);
                    if (registros != null){
                        html = "";
                        html += "<option value='"+registros["tiporeunion_id"]+"' selected >";
                        html += registros["tiporeunion_nombre"];
                        html += "</option>";
                        $("#tiporeunion_id").append(html);
                    }
            },
            error:function(respuesta){
                html = "";
                $("#tiporeunion_id").html(html);
            }

        });   
    }
}