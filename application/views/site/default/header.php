<!DOCTYPE html>
<html lang="en">

<head>
	<base href="./">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="Print On Demand">
	<meta name="keyword" content="Print on Demand, Loja">
	<title><?= isset($title) ? $title : '' ?></title>
	<!-- Icons-->
	<link rel="icon" type="image/ico" href="<?= base_url() ?>/favicon.ico" sizes="any" />
	<link href="<?= base_url('assets') ?>/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/30cc5d93d0.js" crossorigin="anonymous"></script>
	<link href="<?= base_url('assets') ?>/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<!-- Main styles for this application-->
	<link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css" rel="stylesheet">
	</script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
	<header class="app-header navbar">
		<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="<?= base_url('admin/') ?>">
			<img class="navbar-brand-full" src="<?= base_url('assets') ?>/img/brand/logo.webp" width="89" height="auto">
			<img class="navbar-brand-minimized" src="<?= base_url('assets') ?>/img/brand/logo.webp" width="30" height="30" alt="MCM">
		</a>
		<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<strong class="img-avatar"><?= $iniciais ?></strong>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-header text-center">
						<strong>Configurações</strong>
					</div>
					<a class="dropdown-item" href="<?= base_url('admin/meus-dados') ?>">
						<i class="fa fa-user"></i> Meus dados</a>
					<a class="dropdown-item" id="logout" href="#">
						<i class="fa fa-sign-out"></i> Sair
					</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
			<span class="badge badge-pill badge-danger pill-cart"></span>
			<i class="icons font-2xl d-block cui-cart"></i>
		</button>
	</header>
	<div class="app-body">
		<div class="sidebar">
			<nav class="sidebar-nav">
				<ul class="nav">
					<li class="nav-item nav-dropdown">
						<a class="nav-link nav-dropdown-toggle" href="#">
							<!--<i class="nav-icon fas fa-tshirt"></i>--> Usuários</a>
						<ul class="nav-dropdown-items">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/usuarios/gerenciar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Gerenciar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/usuarios/cadastrar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Cadastrar</a>
							</li>
						</ul>
					</li>
					<li class="nav-item nav-dropdown">
						<a class="nav-link nav-dropdown-toggle" href="#">
							<!--<i class="nav-icon fas fa-tshirt"></i>--> Cadastros</a>
						<ul class="nav-dropdown-items">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/cadastros/gerenciar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Gerenciar</a>
							</li>
						</ul>
					</li>
					<li class="nav-item nav-dropdown">
						<a class="nav-link nav-dropdown-toggle" href="#">
							<!--<i class="nav-icon fas fa-tshirt"></i>--> Perguntas</a>
						<ul class="nav-dropdown-items">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/perguntas/gerenciar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Gerenciar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/perguntas/cadastrar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Cadastrar</a>
							</li>
						</ul>
					</li>
					<li class="nav-item nav-dropdown">
						<a class="nav-link nav-dropdown-toggle" href="#">
							<!--<i class="nav-icon fas fa-tshirt"></i>--> Quiz</a>
						<ul class="nav-dropdown-items">
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url("admin/quiz/gerenciar") ?>">
									<i class="nav-icon fas fa-cog" aria-hidden="true"></i> Gerenciar</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url("admin/score/gerenciar") ?>">
							<!--<i class="nav-icon fas fa-tshirt"></i>--> Score</a>
					</li>
				</ul>
			</nav>
			<button class="sidebar-minimizer brand-minimizer" type="button"></button>
		</div>