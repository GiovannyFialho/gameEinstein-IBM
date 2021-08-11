<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <? if ($Breadcrumb) { ?>
            <li class="breadcrumb-item">Home</li>
            <? for ($i = 0; $i < count($Breadcrumb); $i++) { ?>
                <li class="breadcrumb-item <?= $i == array_key_last($Breadcrumb) ? 'active' : '' ?>"><?= $Breadcrumb[$i] ?></li>
            <? } ?>
        <? } ?>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    Meus dados pessoais
                </div>
                <div class="card-body">
                    <form id="configuracoes-user">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="form-group col-12 col-md-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" id="email" type="text" name="email" value="<?= $usuario->Email ?>" disabled>
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    <label for="nome">Nome</label>
                                    <input class="form-control" id="nome" type="text" name="nome" value="<?= $usuario->Nome ?>" disabled>
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    <label for="documento">Documento</label>
                                    <input class="form-control" id="documento" type="text" name="documento" value="<?= $usuario->Documento ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <? if (!$blockData) { ?>
            <div class="card">
                <div class="card-header">
                    Alterar senha
                </div>
                <div class="card-body">
                    <form id="configuracoes-senha">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="form-group col-12 col-md-12">
                                    <label for="senha">Senha</label>
                                    <input class="form-control" id="senha" type="password" name="senha">
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    <label for="senha2">Repita a senha</label>
                                    <input class="form-control" id="senha2" type="password" name="senha2">
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    <button class="btn btn-pill btn-success float-left submit-senha" type="submit">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <? } ?>
        </div>
    </div>
</main>