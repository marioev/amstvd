<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reunion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('reunion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Reunion Id</th>
						<th>Tiporeunion Id</th>
						<th>Estado Id</th>
						<th>Gestion Id</th>
						<th>Reunion Fechahora</th>
						<th>Reunion Inicio</th>
						<th>Reunion Fin</th>
						<th>Reunion Tolerancia</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($reunion as $r){ ?>
                    <tr>
						<td><?php echo $r['reunion_id']; ?></td>
						<td><?php echo $r['tiporeunion_id']; ?></td>
						<td><?php echo $r['estado_id']; ?></td>
						<td><?php echo $r['gestion_id']; ?></td>
						<td><?php echo $r['reunion_fechahora']; ?></td>
						<td><?php echo $r['reunion_inicio']; ?></td>
						<td><?php echo $r['reunion_fin']; ?></td>
						<td><?php echo $r['reunion_tolerancia']; ?></td>
						<td>
                            <a href="<?php echo site_url('reunion/edit/'.$r['reunion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('reunion/remove/'.$r['reunion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
