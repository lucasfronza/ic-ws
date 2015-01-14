        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quadro de presença
                            <!-- <a href="<?=site_url('')?>" class="btn btn-primary" >Adicionar usuário</a> -->
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-6">
                    <?php if (empty($board)): ?>
                        <p style="text-align:center;">Quadro de presença vazio.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> USUÁRIO </th>
                                        <th> PRESENÇAS </th>
                                        <th> FALTAS </th>
                                        <!-- <th> EXCLUIR </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($board as $item): ?>
                                    <tr>
                                        <td><?=$item->user?></td>
                                        <td>
                                            <a href="<?=site_url('course/attendanceUpdate/'.$idCourse.'/'.$item->user.'/'.($item->attendance-1).'/'.$item->absence)?>"><span class="glyphicon glyphicon-minus"></span></a>
                                            <?=$item->attendance?>
                                            <a href="<?=site_url('course/attendanceUpdate/'.$idCourse.'/'.$item->user.'/'.($item->attendance+1).'/'.$item->absence)?>"><span class="glyphicon glyphicon-plus"></span></a>
                                        </td>
                                        <td>
                                            <a href="<?=site_url('course/attendanceUpdate/'.$idCourse.'/'.$item->user.'/'.$item->attendance.'/'.($item->absence-1))?>"><span class="glyphicon glyphicon-minus"></span></a>
                                            <?=$item->absence?>
                                            <a href="<?=site_url('course/attendanceUpdate/'.$idCourse.'/'.$item->user.'/'.$item->attendance.'/'.($item->absence+1))?>"><span class="glyphicon glyphicon-plus"></span></a>
                                        </td>
                                        <!-- <td><a class="btn btn-danger" href='<?=site_url('')?>'><span class="glyphicon glyphicon-trash"></span></a></td> -->
                                    </tr>
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