		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	Perfil
                        	<a href="<?=site_url('profile/edit')?>" class="btn btn-primary" >
                        		<i class="fa fa-wrench fa-fw"></i>
                        		Alterar dados
                        	</a>
                            <a href="<?=site_url('profile/configurations')?>" class="btn btn-warning" >
                                <i class="fa fa-cog fa-fw"></i>
                                Configurações
                            </a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table">
	                        <tr>
								<th style="text-align:left;"> Nome </th>
								<td> <?php echo $user->name; ?> </td>
							</tr>
	                        <tr>
								<th style="text-align:left;"> Sobrenome </th>
								<td> <?php echo $user->surname; ?> </td>
							</tr>
							<tr>
								<th style="text-align:left;"> E-mail </th>
								<td> <?php echo $user->email; ?> </td>
							</tr>
	                        <tr>
								<th style="text-align:left;"> Celular </th>
								<td> <?php echo $user->phone; ?> </td>
							</tr>
	                        <tr>
								<th style="text-align:left;"> Endereço </th>
								<td> <?php echo $user->address; ?> </td>
							</tr>
							<tr>
								<th style="text-align:left;"> Cidade </th>
								<td> <?php echo $user->city; ?> </td>
							</tr>
							<tr>
								<th style="text-align:left;"> Estado </th>
								<td> <?php echo $user->state; ?> </td>
							</tr>
							<tr>
								<th style="text-align:left;"> Tipo </th>
								<td> <?=ucfirst($user->type) ?> </td>
							</tr>
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