<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Informacion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('informacion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Informacion Id</th>
						<th>Organ Id</th>
						<th>Informacion Titulo</th>
						<th>Informacion Fecha</th>
						<th>Informacion Contenido</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($informacion as $i){ ?>
                    <tr>
						<td><?php echo $i['informacion_id']; ?></td>
						<td><?php echo $i['organ_id']; ?></td>
						<td><?php echo $i['informacion_titulo']; ?></td>
						<td><?php echo $i['informacion_fecha']; ?></td>
						<td><?php echo $i['informacion_contenido']; ?></td>
						<td>
                            <a href="<?php echo site_url('informacion/edit/'.$i['informacion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('informacion/remove/'.$i['informacion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
