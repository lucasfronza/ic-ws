        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Quadro de presença
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($board as $item): ?>
                                    <tr>
                                        <td><?=$item->user?></td>
                                        <td><?=$item->attendance?></td>
                                        <td><?=$item->absence?></td>
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