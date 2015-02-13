        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quiz
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                    <legend>
                        <?php if($message == 'correct'): ?>
                            Resposta correta!
                            <a href="<?=site_url('course/quiz/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        <?php elseif($message == 'wrong'): ?>
                            Resposta incorreta. Tente novamente!
                            <a href="<?=site_url('course/quizQuestion/'.$idCourse.'/'.$idQuiz)?>" class="btn btn-warning">Tentar novamente</a>
                        <?php endif; ?>
                    </legend>
                    <?php if($message == 'correct'): ?>
                        <h4>Comentário:</h4>
                        <p class="text-justify"><?=$quiz->comment?></p>
                    <?php elseif($message == 'wrong'): ?>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Ver resposta e comentário</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h4>Resposta correta:</h4>
                                    <p class="text-justify"><?php switch ($quiz->correctAnswer) {
                                        case '1':
                                            echo $quiz->alternative1;
                                            break;
                                        case '2':
                                            echo $quiz->alternative2;
                                            break;
                                        case '3':
                                            echo $quiz->alternative3;
                                            break;
                                        case '4':
                                            echo $quiz->alternative4;
                                            break;
                                        case '5':
                                            echo $quiz->alternative5;
                                            break;
                                        default:
                                            break;
                                    } ?></p>
                                    <h4>Comentário:</h4>
                                    <p class="text-justify"><?=$quiz->comment?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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