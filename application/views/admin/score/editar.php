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
                    <form id="<?= isset($update) ? 'editar-quiz' : 'cadastrar-quiz' ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <input type="hidden" name="id" value="<?= isset($update) ? $update->IdConfigQuiz : "" ?>">
                        <div class="form-group col-12 col-md-8">
                            <label for="enunciado">Data Início Inscrição</label>
                            <input class="form-control" id="dataHoraInicioInscricao" type="text" name="dataHoraInicioInscricao" value="<?= isset($update) ? date("d/m/Y H:i:s", strtotime($update->DataHoraInicioInscricao)) : "" ?>">
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="resposta1">Data Início Quiz</label>
                            <input class="form-control" id="dataHoraInicioQuiz" type="text" name="dataHoraInicioQuiz" value="<?= isset($update) ? date("d/m/Y H:i:s", strtotime($update->DataHoraInicioQuiz)) : "" ?>">
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