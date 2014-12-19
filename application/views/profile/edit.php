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
                            Meu Cadastro
                        </div>
                        <div class="panel-body">
                            <form action="<?=site_url('profile/update')?>" method="post"  role="form" id="form-profileupdate" onsubmit="return validate_profileupdate();">
                                <div class="form-group" id="groupName">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user->name; ?>">
                                    <p id="errorName" class="help-block"></p>
                                </div>
                                <div class="form-group" id="groupSurname">
                                    <label>Sobrenome</label>
                                    <input type="text" class="form-control" id="surname" name="surname" value="<?= $user->surname; ?>">
                                    <p id="errorSurname" class="help-block"></p>
                                </div>

                                <div class="form-group" id="groupPassword">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <p id="errorPassword" class="help-block"></p>
                                </div>
                                        
                                <div class="form-group" id="groupPasswordChecker">
                                    <label>Repetir senha</label>
                                    <input type="password" class="form-control" id="passwordChecker" name="passwordChecker" onblur="validate_password_edit()">
                                    <p id="errorPasswordChecker" class="help-block"></p>
                                </div>
                                        
                                <div class="form-group" id="groupEmail">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user->email; ?>" readonly>
                                    <p id="errorEmail" class="help-block"></p>
                                </div>
                                        
                                <div class="form-group" id="groupPhone">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone; ?>">
                                </div>
                                        
                                <div class="form-group" id="groupAddress">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?= $user->address; ?>">
                                </div>
                                
                                <div class="form-group" id="groupCity">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?= $user->city; ?>">
                                </div>

                                 <div class="form-group" id="groupState">
                                    <label>Estado</label>
                                    <input type="text" class="form-control" id="state" name="state" value="<?= $user->state; ?>">
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