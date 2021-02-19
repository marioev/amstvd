<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Asociado Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Asociado Id</th>
						<th>Estado Id</th>
						<th>Estadocivil Id</th>
						<th>Expedido Id</th>
						<th>Genero Id</th>
						<th>Asociado  Nombre</th>
						<th>Sociado Apellido</th>
						<th>Asociado Fechanac</th>
						<th>Asociado Ci</th>
						<th>Asociado Ciext</th>
						<th>Asociado Codigo</th>
						<th>Asociado Direccion</th>
						<th>Asociado Telefono</th>
						<th>Asociado Celular</th>
						<th>Asociado Foto</th>
						<th>Asociado Email</th>
						<th>Asociado Login</th>
						<th>Asociado Clave</th>
						<th>Asocadio Codactivacion</th>
						<th>Asociado Fechactivacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($asociado as $a){ ?>
                    <tr>
						<td><?php echo $a['asociado_id']; ?></td>
						<td><?php echo $a['estado_id']; ?></td>
						<td><?php echo $a['estadocivil_id']; ?></td>
						<td><?php echo $a['expedido_id']; ?></td>
						<td><?php echo $a['genero_id']; ?></td>
						<td><?php echo $a['asociado__nombre']; ?></td>
						<td><?php echo $a['sociado_apellido']; ?></td>
						<td><?php echo $a['asociado_fechanac']; ?></td>
						<td><?php echo $a['asociado_ci']; ?></td>
						<td><?php echo $a['asociado_ciext']; ?></td>
						<td><?php echo $a['asociado_codigo']; ?></td>
						<td><?php echo $a['asociado_direccion']; ?></td>
						<td><?php echo $a['asociado_telefono']; ?></td>
						<td><?php echo $a['asociado_celular']; ?></td>
						<td><?php echo $a['asociado_foto']; ?></td>
						<td><?php echo $a['asociado_email']; ?></td>
						<td><?php echo $a['asociado_login']; ?></td>
						<td><?php echo $a['asociado_clave']; ?></td>
						<td><?php echo $a['asocadio_codactivacion']; ?></td>
						<td><?php echo $a['asociado_fechactivacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('asociado/edit/'.$a['asociado_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado/remove/'.$a['asociado_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
