        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Turma</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Dados da turma
                        </div>
                        <div class="panel-body">
                            <form action="<?=site_url('course/insert')?>" method="post" role="form" id="form-course">
                
                                <div class="form-group" id="groupName">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="form-group" id="groupCode">
                                    <label>Código</label>
                                    <input type="text" class="form-control" id="code" name="code">
                                </div>

                                <div class="form-group" id="groupTeacher">
                                    <label>Professor(a)</label>
                                    <input type="text" class="form-control" id="teacher" name="teacher">
                                </div>

                                <div class="form-group" id="groupPlace">
                                    <label>Local</label>
                                    <input type="text" class="form-control" id="place" name="place">
                                </div>

                                <div class="form-group" id="groupCredits">
                                    <label>Créditos</label>
                                    <input type="text" class="form-control" id="credits" name="credits">
                                </div>

                                <div class="form-group">
                                    <label>Horário</label>
                                    <textarea name="time" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Criar</button>
                                    <a href="<?=site_url('course')?>" class="btn btn-default">Voltar</a>
                                </div>
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