        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Resultado da busca
                            <a href="<?=site_url('users')?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
                    <?php if (empty($search)): ?>
                      <p style="text-align:center;">Nenhum usuário encontrado.</p>
                      <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> NOME COMPLETO </th>
                                        <th> TIPO </th>
                                        <th> EDITAR </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($search as $item): ?>
                                    <tr>
                                        <td><?=$item->name?> <?=$item->surname?></td>
                                        <td><?=ucfirst($item->type)?></td>
                                        <td><a class="btn btn-primary" href="<?=site_url('users/edit/'.$item->id)?>"><i class="fa fa-pencil"></i></a></td>
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