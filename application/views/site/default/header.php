<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?= isset($title) ? $title : "" ?></title>

        <!-- Icons-->
	    <link rel="icon" type="image/ico" href="<?= base_url() ?>/favicon.ico" sizes="any" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;400;700&display=swap" rel="stylesheet">

        <!-- Main styles for this application-->
	    <link href="<?= base_url("assets") ?>/build/css/style.min.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <a href="/">
                        <img src="<?= base_url("assets") ?>/img/site/logo.svg" alt="IBM Logo">
                    </a>
                </div>
                <nav class="menu">
                    <a class="menu_link" href="/usuarios">Cadastro</a>
                    <a class="menu_link" href="/game">Desafio</a>
                    <a class="menu_link" href="/game/ranking">Ranking</a>
                    <a class="menu_link" href="/game/login">Login</a>
                </nav>
            </div>
        </header>

        <div class="container">
