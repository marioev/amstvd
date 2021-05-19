<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
    function mostrar(a) {
        obj = document.getElementById('oculto'+a);
        obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
        //objm = document.getElementById('map');
        if(obj.style.visibility == 'hidden'){
            $('#map').css({ 'width':'0px', 'height':'0px' });
            $('#mosmapa').text("Obtener ubicación de la empresa");
        }else{
            $('#map').css({ 'width':'100%', 'height':'400px' });
            $('#mosmapa').text("Cerrar mapa");
        }
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Nueva Organizaci&oacute;n</h3>
            </div>
            <?php echo form_open_multipart('organizacion/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="organ_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="organ_nombre" value="<?php echo $this->input->post('organ_nombre'); ?>" class="form-control" id="organ_nombre"  autofocus required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('organ_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="organ_slogan" class="control-label">Slogan</label>
                            <div class="form-group">
                                <input type="text" name="organ_slogan" value="<?php echo $this->input->post('organ_slogan'); ?>" class="form-control" id="organ_slogan" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="organ_direccion" class="control-label">Direcci&oacute;n</label>
                            <div class="form-group">
                                <input type="text" name="organ_direccion" value="<?php echo $this->input->post('organ_direccion'); ?>" class="form-control" id="organ_direccion" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="organ_telefono" class="control-label">Tel&eacute;fono</label>
                            <div class="form-group">
                                <input type="text" name="organ_telefono" value="<?php echo $this->input->post('organ_telefono'); ?>" class="form-control" id="organ_telefono" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="organ_email" class="control-label">Correo Electr&oacute;nico</label>
                            <div class="form-group">
                                <input type="email" name="organ_email" value="<?php echo $this->input->post('organ_email'); ?>" class="form-control" id="organ_email" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="organ_zona" class="control-label">Zona</label>
                            <div class="form-group">
                                <input type="text" name="organ_zona" value="<?php echo $this->input->post('organ_zona'); ?>" class="form-control" id="organ_zona" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="organ_departamento" class="control-label">Departamento</label>
                            <div class="form-group">
                                <input type="text" name="organ_departamento" value="<?php echo $this->input->post('organ_departamento'); ?>" class="form-control" id="organ_departamento" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="organ_imagen" class="control-label">Imagen</label>
                            <div class="form-group">
                                <input type="file" name="organ_imagen" value="<?php echo $this->input->post('organ_imagen'); ?>" class="form-control btn-success" id="organ_imagen" accept="image/png, image/jpeg, image/jpg, image/gif, image/bmp" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener ubicación de la empresa</a></label>
                        <!-- ***********************aqui empieza el mapa para capturar coordenadas *********************** -->
                        <div id="oculto1" style="visibility:hidden">
                        <div id="map"></div>
                        <script type="text/javascript">
                            var marker;          //variable del marcador
                            var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                            var coords_lng = {};    //coordenadas obtenidas con la geolocalización


                            //Funcion principal
                            initMap = function () 
                            {
                                //usamos la API para geolocalizar el usuario
                                    navigator.geolocation.getCurrentPosition(
                                      function (position){
                                        coords_lat =  {
                                          lat: position.coords.latitude,
                                        };
                                        coords_lng =  {
                                          lng: position.coords.longitude,
                                        };
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa

                                      },function(error){console.log(error);});
                            }

                            function setMapa (coords_lat, coords_lng)
                            {
                                    document.getElementById("organ_latitud").value = coords_lat.lat;
                                    document.getElementById("organ_longitud").value = coords_lng.lng;
                                  //Se crea una nueva instancia del objeto mapa
                                  var map = new google.maps.Map(document.getElementById('map'),
                                  {
                                    zoom: 13,
                                    center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });

                                  //Creamos el marcador en el mapa con sus propiedades
                                  //para nuestro obetivo tenemos que poner el atributo draggable en true
                                  //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                                  marker = new google.maps.Marker({
                                    map: map,
                                    draggable: true,
                                    animation: google.maps.Animation.DROP,
                                    position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });
                                  //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                                  //cuando el usuario a soltado el marcador
                                  //marker.addListener('click', toggleBounce);

                                  marker.addListener( 'dragend', function (event)
                                  {
                                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                                    document.getElementById("organ_latitud").value = this.getPosition().lat();
                                    document.getElementById("organ_longitud").value = this.getPosition().lng();
                                  });
                            }
                            initMap();
                        </script>                                            
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcIdlsjMXhMlme9vPTjulEKfadfAox9WE&callback=initMap"></script>                                            
                        </div>
                        <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
                        </div>
                        <div class="col-md-3">
                            <label for="organ_latitud" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="text" name="organ_latitud" value="<?php echo $this->input->post('organ_latitud'); ?>" class="form-control" id="organ_latitud" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="organ_longitud" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="text" name="organ_longitud" value="<?php echo $this->input->post('organ_longitud'); ?>" class="form-control" id="organ_longitud" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="organ_ubicacion" class="control-label">Ubicacion</label>
                            <div class="form-group">
                                <input type="text" name="organ_ubicacion" value="<?php echo $this->input->post('organ_ubicacion'); ?>" class="form-control" id="organ_ubicacion" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('organizacion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>