<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="<?=base_url('static/resources/bootstrap.min.css')?>" rel="stylesheet">
        <link rel="shortcut icon" href="<?=base_url('static/resources/book.ico')?>" type="image/x-icon" />
		<title><?=$title?></title>
  	</head>

    <body>

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=site_url()?>">Menu</a>
                </div>
                <div class="collapse navbar-collapse" id="menu-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php if ($this->session->userdata('logged_in')): ?>

                            <li <?php if($menu == 'LOGOUT') echo 'class="active"'; ?>>
                                <a href="<?=site_url("login/end")?>">LOGOUT</a>
                            </li>
                        <?php else: ?>
                            <li <?php if($menu == 'CADASTRO') echo 'class="active"'; ?>>
                                <a href="<?=site_url("signup")?>">CADASTRO</a>
                            </li>
                        
                            <li <?php if($menu == 'LOGIN') echo 'class="active"'; ?>>
                                <a href="<?=site_url("login")?>">LOGIN</a>
                            </li>   
                        <?php endif; ?>
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <li <?php if($menu == 'PERFIL') echo 'class="active"'; ?>>
                                <a href="<?=site_url("profile")?>">PERFIL</a>
                            </li>
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        