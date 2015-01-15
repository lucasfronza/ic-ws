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
                            <a href="<?=site_url('course/quizQuestion/'.$idCourse.'/'.$idQuiz)?>" class="btn btn-warning">Voltar</a>
                        <?php endif; ?>
                    </legend>
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