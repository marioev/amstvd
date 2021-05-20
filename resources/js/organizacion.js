/* mostrar modal para mostrar imagen del sistema */
function mostrarmodal(organ_nombre, organ_imagen){
    var base_url = document.getElementById('base_url').value;
    $("#nombreorganizacion").html(organ_nombre);
    laimg = "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/organizacion/"+organ_imagen+"' />";
    $("#imagenorganizacion").html(laimg);
    $("#mostrarimagen").modal('show');
}