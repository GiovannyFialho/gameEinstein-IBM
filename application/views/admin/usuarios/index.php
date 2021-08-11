<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <? if ($Breadcrumb) { ?>
            <li class="breadcrumb-item">Home</li>
            <? for($i = 0; $i < count($Breadcrumb); $i++) { ?>
                <li class="breadcrumb-item <?=$i == array_key_last($Breadcrumb) ? 'active' : '' ?>"><?=$Breadcrumb[$i]?></li>
            <? } ?>
        <? } ?>
        <!-- Breadcrumb Menu-->
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                <i class="fa fa-align-justify"></i> Usuários</div>
                <div class="card-body">
                <table class="table table-responsive-sm text-center">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Criação</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($usuarios as $user) { ?>
                        <tr>
                            <td><?=$user->Nome?></td>
                            <td><?=$user->Email?></td>
                            <td><?=date('d/m/Y H:i', strtotime($user->DataCadastro))?></td>
                            <td>
                                <a href="<?=base_url('admin/usuarios/editar/').$user->IdUsuario?>">
                                    <i class="nav-icon fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <? if (isset($pagination['pagination'])) { ?>
                    <li class="page-item prev">
                        <a class="page-link<?=$pagination['prev'] ? '' : ' disabled' ?>" <?=$pagination['prev'] ? "href='{$pagination['prev']}'"  : '' ?>><</a>
                    </li>
                    <?php
                        foreach ($pagination['pagination'] as $pag) {
                    ?>
                    <li class="page-item<?=$pag['active'] ? ' active' : '' ?>">
                        <a class="page-link" href="<?=$pag['path']?>"><?=$pag['pag']?></a>
                    </li>
                    <? } ?>
                    <li class="page-item next">
                        <a class="page-link<?=$pagination['next'] ? '' : ' disabled' ?>" <?=$pagination['next'] ? "href='{$pagination['next']}'"  : '' ?>>></a>
                    </li>
                    <? } ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
</main>