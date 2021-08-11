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
                <div class="card-body">
                    <img class="navbar-brand-full" src="<?=base_url('assets')?>/img/brand/logo.webp" height="auto" style="margin: 0 auto; display: block; padding: 200px 0">    
                </div>
            </div>
        </div>
    </div>
</main>