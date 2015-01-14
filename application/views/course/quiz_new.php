        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quiz
                            <a href="<?=site_url('course/quiz/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Novo Quiz
                        </div>
                        <div class="panel-body">
                            <form action="<?=site_url('course/insertQuiz')?>" method="post" role="form">
                                <input type="hidden" name="idCourse" value="<?=$idCourse?>">
                                <div class="form-group" id="groupName">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group" id="groupQuestion">
                                    <label>Pergunta</label>
                                    <input type="text" class="form-control" id="question" name="question">
                                </div>
                                <div class="form-group" id="groupAlternative">
                                    <label>Alternativa A</label>
                                    <input type="text" class="form-control" id="alternative1" name="alternative1">
                                </div>
                                <div class="form-group" id="groupAlternative">
                                    <label>Alternativa B</label>
                                    <input type="text" class="form-control" id="alternative2" name="alternative2">
                                </div>
                                <div class="form-group" id="groupAlternative">
                                    <label>Alternativa C</label>
                                    <input type="text" class="form-control" id="alternative3" name="alternative3">
                                </div>
                                <div class="form-group" id="groupAlternative">
                                    <label>Alternativa D</label>
                                    <input type="text" class="form-control" id="alternative4" name="alternative4">
                                </div>
                                <div class="form-group" id="groupAlternative">
                                    <label>Alternativa E</label>
                                    <input type="text" class="form-control" id="alternative5" name="alternative5">
                                </div>
                                <div class="form-group">
                                    <label>Resposta</label>
                                    <select class="form-control" name="correctAnswer">
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Criar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
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