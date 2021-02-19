<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mesa Directiva Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('mesa_directiva/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Mesadir Id</th>
						<th>Asociado Id</th>
						<th>Gestion Id</th>
						<th>Organ Id</th>
						<th>Estado Id</th>
						<th>Mesadir Nombreasoc</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($mesa_directiva as $m){ ?>
                    <tr>
						<td><?php echo $m['mesadir_id']; ?></td>
						<td><?php echo $m['asociado_id']; ?></td>
						<td><?php echo $m['gestion_id']; ?></td>
						<td><?php echo $m['organ_id']; ?></td>
						<td><?php echo $m['estado_id']; ?></td>
						<td><?php echo $m['mesadir_nombreasoc']; ?></td>
						<td>
                            <a href="<?php echo site_url('mesa_directiva/edit/'.$m['mesadir_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('mesa_directiva/remove/'.$m['mesadir_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
