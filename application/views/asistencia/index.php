<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Asistencia Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asistencia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Asistencia Id</th>
						<th>Reunion Id</th>
						<th>Asociado Id</th>
						<th>Asistenca Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($asistencia as $a){ ?>
                    <tr>
						<td><?php echo $a['asistencia_id']; ?></td>
						<td><?php echo $a['reunion_id']; ?></td>
						<td><?php echo $a['asociado_id']; ?></td>
						<td><?php echo $a['asistenca_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('asistencia/edit/'.$a['asistencia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asistencia/remove/'.$a['asistencia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
