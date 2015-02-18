        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Minhas configurações
                        </div>
                        <div class="panel-body">
                            <form action="<?=site_url('profile/configurationsUpdate')?>" method="post"  role="form" id="form-profileupdate" onsubmit="return validate_profileupdate();">
                                <input type="hidden" name="notifications" value="0">
                                <div class="form-group" id="groupNotifications">
                                    <label>Notificações</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="notifications" name="notifications" value="1"
                                                <?php if($user->notifications == 1) { echo "checked"; } ?>
                                            >
                                            Desejo receber notificações por email
                                        </label>
                                    </div>
                                </div>

                                <hr>
                                
                                <button type="submit" class="btn btn-primary col-md-offset-2">Salvar alterações</button>
                                <a href="<?=site_url('profile')?>" class="btn btn-default">Voltar</a>
                                
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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