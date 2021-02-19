<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Orden Dia Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('orden_dia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Ordendia Id</th>
						<th>Reunion Id</th>
						<th>Ordendia Nombre</th>
						<th>Ordendia Observacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($orden_dia as $o){ ?>
                    <tr>
						<td><?php echo $o['ordendia_id']; ?></td>
						<td><?php echo $o['reunion_id']; ?></td>
						<td><?php echo $o['ordendia_nombre']; ?></td>
						<td><?php echo $o['ordendia_observacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('orden_dia/edit/'.$o['ordendia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('orden_dia/remove/'.$o['ordendia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
