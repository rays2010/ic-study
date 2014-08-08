<?php 
	$this->load->view('templates/header');
?>

<div id="content">
<?php print_r($topics); ?>
</div>

<?php
	$this->load->view('pages/user/side');
	$this->load->view('templates/footer');
?>