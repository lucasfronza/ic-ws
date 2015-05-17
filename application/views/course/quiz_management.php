        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quiz
                            <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                <a href="<?=site_url('course/addQuiz/'.$idCourse)?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Novo</a>
                            <?php endif; ?>
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <h3><?=$answers->answers?> de <?=$answers->questions?> questões respondidas</h3>
                        <div class="progress">
                            <?php if ($answers->questions == 0) {
                                $progressBarWidth = 0;
                            } else {
                                $progressBarWidth = number_format(100*$answers->answers/$answers->questions, 0);
                            } ?>
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width: <?=$progressBarWidth?>%">
                                <?=$progressBarWidth?>%
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="70%"> NOME </th>
                                    <!-- <th> GERENCIAR </th> -->
                                    <th> RESPONDER </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($quizzes as $item): ?>
                                <tr>
                                    <td  width="70%"><?=$item->name?></td>
                                    <!-- <td><a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-primary"><span class="glyphicon glyphicon-hand-up"></span></a></td> -->
                                    <td><a href="<?=site_url('course/quizQuestion/'.$idCourse.'/'.$item->id)?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
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