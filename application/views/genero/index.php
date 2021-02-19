<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Genero Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('genero/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Genero Id</th>
						<th>Genero Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($genero as $g){ ?>
                    <tr>
						<td><?php echo $g['genero_id']; ?></td>
						<td><?php echo $g['genero_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('genero/edit/'.$g['genero_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('genero/remove/'.$g['genero_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
