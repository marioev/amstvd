<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Expedido Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('expedido/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Expedido Id</th>
						<th>Expedido Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($expedido as $e){ ?>
                    <tr>
						<td><?php echo $e['expedido_id']; ?></td>
						<td><?php echo $e['expedido_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('expedido/edit/'.$e['expedido_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('expedido/remove/'.$e['expedido_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
