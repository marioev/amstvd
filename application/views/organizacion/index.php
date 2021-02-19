<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Organizacion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('organizacion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Organ Id</th>
						<th>Organ Nombre</th>
						<th>Organ Slogan</th>
						<th>Organ Direccion</th>
						<th>Organ Telefono</th>
						<th>Organ Imagen</th>
						<th>Organ Departamento</th>
						<th>Organ Zona</th>
						<th>Organ Ubicacion</th>
						<th>Organ Email</th>
						<th>Organ Latitud</th>
						<th>Organ Longitud</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($organizacion as $o){ ?>
                    <tr>
						<td><?php echo $o['organ_id']; ?></td>
						<td><?php echo $o['organ_nombre']; ?></td>
						<td><?php echo $o['organ_slogan']; ?></td>
						<td><?php echo $o['organ_direccion']; ?></td>
						<td><?php echo $o['organ_telefono']; ?></td>
						<td><?php echo $o['organ_imagen']; ?></td>
						<td><?php echo $o['organ_departamento']; ?></td>
						<td><?php echo $o['organ_zona']; ?></td>
						<td><?php echo $o['organ_ubicacion']; ?></td>
						<td><?php echo $o['organ_email']; ?></td>
						<td><?php echo $o['organ_latitud']; ?></td>
						<td><?php echo $o['organ_longitud']; ?></td>
						<td>
                            <a href="<?php echo site_url('organizacion/edit/'.$o['organ_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('organizacion/remove/'.$o['organ_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
