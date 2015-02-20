        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Busca de usuários
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-md-7">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <form action="<?=site_url('users/search/')?>" method="post" role="form" id="form-course">
                                <div class="form-group" id="groupName">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="form-group" id="groupSurname">
                                    <label>Sobrenome</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                </div>

                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
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