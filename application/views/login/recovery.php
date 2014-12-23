        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                	<h1 class="page-header">Login</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
					<form action="<?=site_url('login/password_reset')?>" method="post" role="form" id="form-signup">
			  
						<div class="form-group" id="groupEmail">
							<label>Email</label>
							<input type="text" class="form-control" id="email" name="email">
						</div> 

						<hr>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Recuperar senha</button>
							<a href="<?=site_url('login')?>" class="btn btn-default">Cancelar</a>
						</div>
					</form>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Social Buttons CSS -->
    <link href="<?=base_url('static/css/plugins/social-buttons.css')?>" rel="stylesheet">

    <!-- jQuery Version 1.11.0 -->
    <script src="<?=base_url('static/js/jquery-1.11.0.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('static/js/plugins/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('static/js/sb-admin-2.js')?>"></script>

    <!-- Form validation -->
    <script src="<?=base_url('static/resources/validation.js')?>"></script>

</body>

</html>