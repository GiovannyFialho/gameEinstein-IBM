<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <? if ($Breadcrumb) { ?>
        <li class="breadcrumb-item">Home</li>
        <? for($i = 0; $i < count($Breadcrumb); $i++) { ?>
        <li class="breadcrumb-item <?= $i == array_key_last($Breadcrumb) ? 'active' : '' ?>"><?= $Breadcrumb[$i] ?></li>
        <? } ?>
        <? } ?>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    Finalizar etiqueta
                </div>
                <div class="card-body">
                    <form id="<?= isset($update) ? 'editar-usuario' : 'cadastrar-usuario' ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <input type="hidden" name="id" value="<?= isset($update) ? $update->IdUsuario : "" ?>">
                        <div class="form-group col-12 col-md-8">
                            <label for="nome">Nome</label>
                            <input class="form-control" id="nome" type="text" name="nome" value="<?= isset($update) ? $update->Nome : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" value="<?= isset($update) ? $update->Email : "" ?>" <?= isset($update) ? "readonly" : "" ?>>
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="documento">Documento</label>
                            <input class="form-control cpf" id="documento" type="text" name="documento" value="<?= isset($update) ? $update->Documento : "" ?>">
                        </div>
                        <div class="form-group col-12">
                            Ativo <br />
                            <?
                            $checked = "checked";
                            if (isset($update)) {
                                $checked = $update->Status == 1 ? "checked" : "";
                            }
                            ?>
                            <label class="switch switch-label switch-pill switch-success">
                                <input class="switch-input" name="ativo" value="1" type="checkbox" <?= $checked ?>>
                                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        </div>
                        <? if (!isset($update)) { ?>
                        <div class="col-12 col-md-8">
                            <small>Novos usuários serão cadastrado com a senha Mudar@123</small>
                        </div>
                        <?} ?>
                        <div class="form-group col-12 col-md-8">
                            <button class="btn btn-pill btn-success float-left" type="submit">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>