        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Usuário
                        <a href="<?=site_url('users')?>" class="btn btn-warning">Voltar</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th style="text-align:left;"> Nome </th>
                                <td> <?=$user->name?> </td>
                            </tr>
                            <tr>
                                <th style="text-align:left;"> Sobrenome </th>
                                <td> <?=$user->surname?> </td>
                            </tr>
                            <tr>
                                <th style="text-align:left;"> Email </th>
                                <td> <?=$user->email?> </td>
                            </tr>
                            <tr>
                                <th style="text-align:left;"> Tipo </th>
                                <td> <?=ucfirst($user->type)?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <form action="<?=site_url('users/update')?>" method="post"  role="form" id="form-profileupdate" onsubmit="return validate_profileupdate();">
                                <input type="hidden" name="id" value="<?=$user->id?>">
                                <div class="form-group" id="groupType">
                                    <label>Alterar tipo de usuário:</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="aluno">Aluno</option>
                                        <option value="professor">Professor</option>
                                        <?php if($this->session->userdata('type') == 'administrador'): ?>
                                        <option value="administrador">Administrador</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <hr>
                                
                                <button type="submit" class="btn btn-primary">Alterar</button>
                                
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