		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	Repositório
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-10">
	                <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
		                <form action="<?=site_url('course/uploadFile/'.$idCourse)?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" id="form-upload">
							<div class="form-group" id="groupFile">
								<label for="userfile" class="col-sm-2 control-label">Arquivo</label>
								<div class="col-sm-5">
									<input type="file" class="form-control" id="userfile" name="userfile">
								</div>

								<div class="col-sm-4">
									<button type="submit" class="btn btn-primary">Fazer Upload</button>
								</div>
							</div>
						</form>
						<hr>
					<?php endif; ?>
	                <?php if (empty($files)): ?>
	                	<p style="text-align:center;">Repositório vazio.</p>
	                <?php else: ?>
	                	<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th> ARQUIVO </th> 
										<th class="visible-md visible-lg"> CRIADO POR </th>
										<th class="visible-md visible-lg"> MODIFICADO </th>
										<th> TAMANHO </th>
										<?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
											<th> REMOVER </th>
										<?php endif; ?>
									</tr>
								</thead>
								
								<tbody>
									<?php foreach ($files as $item): ?>
									<tr>
										<td><a href="<?=$item->path?>"><?=$item->name?></a></td>
										<td class="visible-md visible-lg"><?=$item->uploadedBy?></td>
										<td class="visible-md visible-lg">
											<?php
												$time = strtotime($item->modified);
												echo date('d-m-Y H:i:s', $time);
											?>
										</td>
										<td><?=$item->size?> KB</td>
										<?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
											<td><a class="btn btn-danger" href="<?=site_url('course/removeFile/'.$idCourse.'/'.$item->id)?>"><span class="glyphicon glyphicon-remove"></span></a></td>
										<?php endif; ?>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
       				<?php endif; ?>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url('static/js/jquery-1.11.0.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('static/js/plugins/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('static/js/sb-admin-2.js')?>"></script>

</body>

</html>