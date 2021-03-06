<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?= isset($title) ? $title : "" ?></title>

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
                        <img src="<?= base_url("assets") ?>/img/site/logo.svg" width="82" height="33" loading="lazy" alt="IBM Logo">
                    </a>
                </div>
                <div class="menu-container">
                    <input id="menu-hamburguer" type="checkbox" />
                    <label for="menu-hamburguer">
                        <div class="menu">
                            <span class="hamburguer"></span>
                        </div>
                    </label>
                    <div class="menu-container-items" id="contain-sider-bar">
                        <div class="sider-bar">
                            <input
                                id="close-menu-hamburguer"
                                type="checkbox"
                                checked
                            />
                            <label for="close-menu-hamburguer">
                                <div class="menu">
                                    <span class="hamburguer"></span>
                                </div>
                            </label>
                            <nav class="menu-items">
                                <?if(!$this->session->userSession){?>
                                    <a class="menu_link <?= $title == "Cadastro" ? "active" : "" ?>" href="/usuarios">Cadastro</a>
                                <?}?>
                                <?if($this->session->userSession){?>
                                    <a class="menu_link <?= $title == "Desafio" ? "active" : "" ?>" href="/game">Desafio</a>
                                <?}?>
                                <a class="menu_link <?= $title == "Ranking" ? "active" : "" ?>" href="/game/ranking">Ranking</a>
                                <?if($this->session->userSession){?>
                                    <a class="menu_link" href="/usuarios/logout">Logout</a>
                                <?}else{?>
                                    <a class="menu_link <?= $title == "Login" ? "active" : "" ?>" href="/game/login">Login</a>
                                <?}?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
