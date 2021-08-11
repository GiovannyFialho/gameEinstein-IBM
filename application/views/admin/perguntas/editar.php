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
                    <form id="<?= isset($update) ? 'editar-pergunta' : 'cadastrar-pergunta' ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <input type="hidden" name="id" value="<?= isset($update) ? $update->IdPergunta : "" ?>">
                        <div class="form-group col-12 col-md-8">
                            <label for="enunciado">Enunciado</label>
                            <textarea class="form-control" id="enunciado" name="enunciado"><?= isset($update) ? $update->Enunciado : "" ?></textarea>
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta1">Alternativa 1</label>
                            <input class="form-control" id="resposta1" type="text" name="resposta1" value="<?= isset($update) ? $update->Resposta1 : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta2">Alternativa 2</label>
                            <input class="form-control" id="resposta2" type="text" name="resposta2" value="<?= isset($update) ? $update->Resposta2 : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta3">Alternativa 3</label>
                            <input class="form-control" id="resposta3" type="text" name="resposta3" value="<?= isset($update) ? $update->Resposta3 : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta4">Alternativa 4</label>
                            <input class="form-control" id="resposta4" type="text" name="resposta4" value="<?= isset($update) ? $update->Resposta4 : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta5">Alternativa 5</label>
                            <input class="form-control" id="resposta5" type="text" name="resposta5" value="<?= isset($update) ? $update->Resposta5 : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="respostaCorreta">Número da alternativa correta</label>
                            <input class="form-control" id="respostaCorreta" type="text" name="respostaCorreta" placeholder="Ex.: 1" value="<?= isset($update) ? $update->RespostaCorreta : "" ?>">
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
                        <div class="form-group col-12 col-md-8">
                            <button class="btn btn-pill btn-success float-left" type="submit">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>