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
                if(n == ""){
                    document.getElementById('loader').style.display = 'none';
                    alert("El asociado: "+asociado_nombre+" no tiene deudas");
                }else{
                    var deudatotal = Number(0);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        deudatotal += Number(registros[i]["aporteasoc_acobrar"]);
                        html += "<tr>";
                        html += "<td class='text-center'>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["aporte_nombre"]+"</td>";
                        html += "<td>"+registros[i]["tipoaporte_nombre"]+"</td>";
                        html += "<td>"+registros[i]["gestion_nombre"]+"</td>";
                        html += "<td class='text-right'><span id='aporteacobrar"+registros[i]["aporteasoc_id"]+"'>"+Number(registros[i]["aporteasoc_acobrar"]).toFixed(2)+"</span></td>";
                        html += "<td>";
                        html += "<input type='checkbox' id='pagaraporte"+registros[i]["aporteasoc_id"]+"' name='checkpagar[]' value='"+registros[i]["aporteasoc_id"]+"' class='seltodo' onclick='calculartotal()' />";
                        html += "</td>";
                        html += "</tr>";
                    }
                    html += "<tr style='font-size: 11pt'>";
                    html += "<td colspan='4' class='text-right' style='padding: 0; vertical-align: central'><b>TOTAL A PAGAR:</b></td>";
                    html += "<td colspan='2' class='text-right' style='padding: 0'><b><input style='background: #eb8634' class='text-right' type='number' min='0' step='any' size='12' id='totalapagar' name='totalapagar' value='0.00' readonly /></b></td>";
                    html += "</tr>";
                    html += "<tr style='font-size: 11pt'>";
                    html += "<td colspan='4' class='text-right' style='padding: 0'><b>EFECTIVO:</b></td>";
                    html += "<td colspan='2' class='text-right' style='padding: 0'><input style='background: #ebb081; cursor:pointer;' class='text-right' type='number' min='0' step='any' size='12' id='efectivo' name='efectivo' value='0.00' onkeyup='calcular_cambio(event)' onclick='marcar(1)' /></td>";
                    html += "</tr>";
                    html += "<tr style='font-size: 11pt'>";
                    html += "<td colspan='4' class='text-right' style='padding: 0'><b>CAMBIO:</b></td>";
                    html += "<td colspan='2' class='text-right' style='padding: 0'><b><input style='background: #e6494f' class='text-right' type='number' min='0' step='any' size='12' id='cambio' name='cambio' value='0.00' readonly /></b></td>";
                    html += "</tr>";
                    html += "<tr style='font-size: 12px'>";
                    html += "<td colspan='2' style='padding: 0' class='text-right'>";
                    html += "<b>PAGADO POR:</b>";
                    html += "</td>";
                    html += "<td colspan='4' style='padding: 0'>";
                    html += "<input type='text' size='50' id='pagadopor' name='pagadopor' value='"+asociado_nombre+"' onclick='marcar(2)' style='cursor:pointer;' onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' />";
                    html += "</td>";
                    html += "</tr>";
                    html += "<tr style='font-size: 12px'>";
                    html += "<td colspan='2' style='padding: 0' class='text-right'>";
                    html += "<b>OBSERVACION:</b>";
                    html += "</td>";
                    html += "<td colspan='4' style='padding: 0'>";
                    html += "<input type='text' size='50' max='250' id='observacion' name='observacion' onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' />";
                    html += "</td>";
                    html += "</tr>";
                    //var filtro = document.getElementById('filtrar').value;
                    //$("#modaldardebajaasociado").modal('hide');
                    $("#ladeuda").html(Number(deudatotal).toFixed(2));
                    //$("#selectodo").
                    $("#selectodo").prop("checked", false);
                    $("#listadedeudas").html(html);
                    //tabla_aporteasociado(filtro);
                    $("#modalmostrardeuda").modal('show');
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

/* calcula los aportes segun se haga check */
function calculartotal(){
    var totalapagar = Number(0);
    var parapagar =[];
    $('[name="checkpagar[]"]:checked').each(function(){
        //cada elemento seleccionado
        var aporte = $("#aporteacobrar"+$(this).val()).text();
        totalapagar += Number(aporte);
        
        parapagar.push({aporteasoc_id:this.value, aporteasoc_cobrado:aporte});
    });
    const myString = JSON.stringify(parapagar);
    $("#parapagar").val(myString);
    $("#totalapagar").val(Number(totalapagar).toFixed(2));
    $("#efectivo").val(Number(totalapagar).toFixed(2));
}

/* calcula todos los checks*/
function marcartodo(source){
    checkboxes = document.getElementsByClassName('seltodo');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
    calculartotal();
}

/* cobra los aportes de un asociado!..  */
function cobrar(){
    if($("#totalapagar").val() <= 0 ){
        alert("Primero debe marcar lo que pagara!.");
    }else{
        var base_url = document.getElementById('base_url').value;
        var respuesta = document.getElementById('parapagar').value;
        var parapagar =  JSON.parse(respuesta);
        //var seltodo = document.getElementsByClassName('seltodo');
        var asociado_id = document.getElementById('elasociadoactual').value;
        var pagado_total = $("#totalapagar").val();
        var efectivo = $("#efectivo").val();
        var cambio = $("#cambio").val();
        var pagadopor = $("#pagadopor").val();
        var observacion = $("#observacion").val();
        var controlador = base_url+'pagado/pagar';
        document.getElementById('loader2').style.display = 'block'; //muestra el loader
        $.ajax({url:controlador,
            type:"POST",
            data:{asociado_id:asociado_id, parapagar:parapagar, pagado_quienpaga:pagadopor,
                  pagado_total:pagado_total, pagado_efectivo:efectivo, pagado_cambio:cambio,
                  pagado_obs:observacion},
            success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if (registros != null){
                $("#modalmostrardeuda").modal('hide');
                document.getElementById('loader2').style.display = 'none';
                
                dir_url = base_url+"pagado/recibo_carta/"+registros;
                window.open(dir_url, '_blank');
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

/* marca el input efectivo(valor =1); pagadopor(valor=2) */
function marcar(valor){
    if(valor == 1){
        document.getElementById('efectivo').select();
    }else if(valor == 2){
        document.getElementById('pagadopor').select();
    }
}

/* calcula el cambio a devolver al momento de cobrar */
function calcular_cambio(e){
    tecla = (document.all) ? e.keyCode : e.which; 
    var eltotal = $("#totalapagar").val();
    var elefectivo = $("#efectivo").val();
    var cambio = Number(elefectivo)-Number(eltotal);
    $("#cambio").val(cambio);
    if (tecla==13){
        $("#cobrar").click();
    }
}