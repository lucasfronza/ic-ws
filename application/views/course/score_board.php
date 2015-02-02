        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quadro de Notas
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                    <?php if (empty($board)): ?>
                        <p style="text-align:center;">Quadro de notas vazio.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> USUÁRIO </th>
                                        <th> NOTA </th>
                                        <th> ATUALIZAR </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($board as $item): ?>
                                    <form action="<?=site_url('course/scoreUpdate')?>" method="post" role="form">
                                        <input type="hidden" name="id" value="<?=$item->id?>">
                                        <input type="hidden" name="scoreKey" value="<?=$scoreKey?>">
                                        <input type="hidden" name="idCourse" value="<?=$idCourse?>">
                                        <tr>
                                            <td><?=$item->name?></td>
                                            <td><input type="text" class="form-control " id="score" name="score" value="<?=number_format($item->score,2)?>"></td>
                                            <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span></button></td>
                                        </tr>
                                    </form>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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