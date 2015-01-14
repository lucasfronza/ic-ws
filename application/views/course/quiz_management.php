        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quiz
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
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
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Criar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="60%"> NOME </th>
                                    <th> GERENCIAR </th>
                                    <th> RESPONDER </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($quizzes as $item): ?>
                                <tr>
                                    <td  width="60%"><?=$item->name?></td>
                                    <td><a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-primary"><span class="glyphicon glyphicon-hand-up"></span></a></td>
                                    <td><a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
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