        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Participantes
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> USUÁRIO </th>
                                    <th> EMAIL </th>
                                    <th width="20%"> REMOVER </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($linkedUsers as $item): ?>
                                <tr>
                                    <td><a href="<?=site_url('profile/user/'.$item->idUser)?>"><i class="fa fa-eye"></i></a>
                                        <a href="<?=site_url('messages/user/'.$item->idUser)?>"><i class="fa fa-envelope"></i></a>
                                        <?=$item->name?> <?=$item->surname?></td>
                                    <td><?=$item->email?></td>
                                    <td><a class="btn btn-danger" href="<?=site_url('course/removeUser/'.$idCourse.'/'.$item->id)?>"><span class="glyphicon glyphicon-remove"></span></a></td>
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