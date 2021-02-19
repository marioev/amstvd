<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Reunion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_reunion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tiporeunion Id</th>
						<th>Tiporeunion Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_reunion as $t){ ?>
                    <tr>
						<td><?php echo $t['tiporeunion_id']; ?></td>
						<td><?php echo $t['tiporeunion_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_reunion/edit/'.$t['tiporeunion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_reunion/remove/'.$t['tiporeunion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
