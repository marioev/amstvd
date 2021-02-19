<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aporte Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aporte/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Aporte Id</th>
						<th>Tipoaporte Id</th>
						<th>Gestion Id</th>
						<th>Estado Id</th>
						<th>Aporte Nombre</th>
						<th>Aporte Nombrepago</th>
						<th>Aporte Mes</th>
						<th>Aporte Anio</th>
						<th>Aporte Monto</th>
						<th>Aporte Fechahora</th>
						<th>Aporte Obs</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($aporte as $a){ ?>
                    <tr>
						<td><?php echo $a['aporte_id']; ?></td>
						<td><?php echo $a['tipoaporte_id']; ?></td>
						<td><?php echo $a['gestion_id']; ?></td>
						<td><?php echo $a['estado_id']; ?></td>
						<td><?php echo $a['aporte_nombre']; ?></td>
						<td><?php echo $a['aporte_nombrepago']; ?></td>
						<td><?php echo $a['aporte_mes']; ?></td>
						<td><?php echo $a['aporte_anio']; ?></td>
						<td><?php echo $a['aporte_monto']; ?></td>
						<td><?php echo $a['aporte_fechahora']; ?></td>
						<td><?php echo $a['aporte_obs']; ?></td>
						<td>
                            <a href="<?php echo site_url('aporte/edit/'.$a['aporte_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('aporte/remove/'.$a['aporte_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
