<!DOCTYPE html>
<html lang="en">

<head>
	<base href="./">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>MCM Brand Experience</title>
	<!-- Icons-->
	<link href="<?= base_url('assets') ?>/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<!-- Main styles for this application-->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/style.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card-group">
					<div class="col-12 text-center">
						<img src="<?= base_url('assets') ?>/img/brand/logo.webp" alt="MCM Brand Experience" id="login-logo">
					</div>
					<div class="card p-4">
						<div class="card-body">
							<h1>Login</h1>
							<p class="text-muted">Acesse sua conta</p>
							<form id="login">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="icon-user"></i>
										</span>
									</div>
									<input class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="input-group mb-4">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="icon-lock"></i>
										</span>
									</div>
									<input class="form-control" type="password" name="senha" placeholder="Senha">
								</div>
								<div class="row">
									<div class="col-6">
										<button class="btn btn-primary px-4" type="submit">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- CoreUI and necessary plugins-->
	<script src="<?= base_url('assets') ?>/vendors/jquery/js/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/popper.js/js/popper.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/pace-progress/js/pace.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/@coreui/coreui/js/coreui.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.js"></script>
	<script src="<?= base_url('assets') ?>/js/src/client.min.js"></script>
	<script src="<?= base_url('assets') ?>/js/validate.js"></script>
	<script src="<?= base_url('assets') ?>/js/mask.js"></script>
	<script src="<?= base_url('assets') ?>/js/main.js"></script>
	<script src="<?= base_url('assets') ?>/js/login.js"></script>
</body>

</html>