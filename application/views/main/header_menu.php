<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('static/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url('static/css/plugins/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?=base_url('static/css/plugins/timeline.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url('static/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url('static/css/plugins/morris.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url('static/font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url('')?>">ICMC's MLE</a>
            </div>
            <!-- /.navbar-header -->
            <?php if($this->session->userdata('logged_in')): ?>
            <ul class="nav navbar-top-links navbar-right">
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <?php 
                            echo $this->session->userdata('name').' '.$this->session->userdata('surname');
                        ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=site_url("profile")?>"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=site_url("login/end")?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php endif; ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <?php if (isset($course)): ?>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?=$course->name?><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                    <li><a href="<?=site_url('course/manage/'.$course->id)?>"><i class="fa fa-pencil fa-fw"></i> Gerência</a></li>
                                    <?php else: ?>
                                    <li><a href="<?=site_url('course/manage/'.$course->id)?>"><i class="fa fa-pencil fa-fw"></i> Turma</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?=site_url('course/microblog/'.$course->id)?>"><i class="fa fa-comments fa-fw"></i> Microblog</a></li>
                                    <li><a href="<?=site_url('course/users/'.$course->id)?>"><i class="fa fa-users fa-fw"></i> Participantes</a></li>
                                    <li><a href="<?=site_url('course/scoreBoard/'.$course->id)?>"><i class="fa fa-table fa-fw"></i> Quadro de Notas</a></li>
                                    <li><a href="<?=site_url('course/attendanceBoard/'.$course->id)?>"><i class="fa fa-table fa-fw"></i> Quadro de Presença</a></li>
                                    <li><a href="<?=site_url('course/quiz/'.$course->id)?>"><i class="fa fa-question-circle fa-fw"></i> Quiz</a></li>
                                    <li><a href="<?=site_url('course/repo/'.$course->id)?>"><i class="fa fa-folder fa-fw"></i> Repositório</a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="divider">
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?=site_url("course")?>" <?php if($menu == 'TURMAS') echo 'class="active"'; ?>>
                                    <i class="fa fa-university fa-fw"></i> TURMAS
                                </a>
                            </li>
                            <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                            <li>
                                <a href="<?=site_url("users")?>" <?php if($menu == 'USUÁRIOS') echo 'class="active"'; ?>>
                                    <i class="fa fa-users fa-fw"></i> USUÁRIOS
                                </a>
                            </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <a href="<?=site_url("signup")?>" <?php if($menu == 'CADASTRO') echo 'class="active"'; ?>>
                                    <i class="fa fa-pencil fa-fw"></i> CADASTRO
                                </a>
                            </li>
                        
                            <li>
                                <a href="<?=site_url("login")?>" <?php if($menu == 'LOGIN') echo 'class="active"'; ?>>
                                    <i class="fa fa-sign-in fa-fw"></i> LOGIN
                                </a>
                            </li>   
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>