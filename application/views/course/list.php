		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	Minhas turmas
                            <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                        	   <a class='btn btn-primary' href='<?=site_url('course/create')?>'> <span class='glyphicon glyphicon-plus'></span> Nova Turma </a>
                            <?php endif; ?>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
					<thead>
						<tr>
							<th> CÓDIGO </th> 
							<th> NOME </th>
							<th width="20%"> ACESSAR </th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($courses as $item): ?>
						<tr>
							<td><?=$item->code?></td>
							<td><?=$item->name?></td>
							<td><a class="btn btn-primary" href='<?=site_url("course/manage/".$item->id)?>'><span class="glyphicon glyphicon-hand-up"></span></a></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
                    </div>
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