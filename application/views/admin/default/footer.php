    </div>
    <footer class="app-footer">
    	<div class="ml-auto">
    		<a href="https://www.mcmbrandexperience.com/" target="_blank">MCM Brand Experience</a>
    		<span>&copy; 2019 Todos os diretos reservados.</span>
    	</div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets') ?>/vendors/jquery/js/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendors/@coreui/coreui/js/coreui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/validate.js"></script>
    <script src="<?= base_url('assets') ?>/js/additional-methods.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/validate-custom-methods.js"></script>
    <script src="<?= base_url('assets') ?>/js/mask.js"></script>
    <script src="<?= base_url('assets') ?>/js/main.js"></script>
    <script src="<?= base_url('assets') ?>/js/admin.js"></script>
    <?
	if (isset($scripts)) {
		if (is_array($scripts)) {
			foreach ($scripts as $js) {
				$filename = base_url('assets') . "/js/$js.js";
				echo file_exists("assets/js/$js.js") ? "<script src='$filename'></script>" : '';
			}
		} else {
			echo file_exists("assets/js/$scripts.js") ? "<script src=" . base_url('assets') . "/js/$scripts.js></script>" : '';
		}
	}
	?>
    </body>

    </html>