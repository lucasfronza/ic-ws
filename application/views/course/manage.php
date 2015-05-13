        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Turma
                            <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                <a href="<?=site_url('course/edit/'.$course->id)?>" class="btn btn-warning" >Alterar dados</a>
                                <!-- <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTurma" data-toggle="dropdown">
                                        Mais opções
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownTurma">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/repo/'.$course->id)?>">Repositório</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/users/'.$course->id)?>">Participantes</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/microblog/'.$course->id)?>">Microblog</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/attendanceBoard/'.$course->id)?>">Quadro de Presença</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/scoreBoard/'.$course->id)?>">Quadro de Notas</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/quiz/'.$course->id)?>">Quiz</a></li>
                                    </ul>
                                </div> -->
                                <a href="<?=site_url('course/manage/'.$course->id.'/remove_course')?>" class="btn btn-danger" >Excluir turma</a>
                            <?php endif; ?>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
                    <?php if($message == "remove_course"): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Tem certeza que deseja excluir a turma <?=$course->name?> ?
                            <a class='btn btn-success' href='<?=site_url('course/delete/'.$course->id)?>'> SIM </a>
                            <a class='btn btn-primary' data-dismiss="alert" href='<?=site_url('course/manage/'.$course->id)?>'> NÃO </a>
                        </div>
                    <?php endif; ?>
                    <table class="table table-hover">
                        <tr>
                            <th style="text-align:left;"> Nome </th>
                            <td> <?php echo $course->name; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Código </th>
                            <td> <?php echo $course->code; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Professor(a) </th>
                            <td> <?php echo $course->teacher; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Local </th>
                            <td> <?php echo $course->place; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Créditos </th>
                            <td> <?php echo $course->credits; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Horário </th>
                            <td> <?php echo $course->time; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;"> Descrição </th>
                            <td> <?php echo $course->description; ?> </td>
                        </tr>
                    </table>
                    <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                        <h2> Adicionar participantes</h2>
                        <hr>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form action="<?=site_url('course/usersSearch/'.$course->id)?>" method="post" role="form" id="form-course">
                                    <div class="form-group" id="groupName">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="form-group" id="groupSurname">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" id="surname" name="surname">
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                        <a href="<?=site_url('course/users/'.$course->id)?>" class="btn btn-default">Visualizar todos</a>
                                    </div>
                                </form>
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