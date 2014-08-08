<?php 
	$this->load->view('templates/header');
?>

<div id="content">
<?php 
	$this->load->view('templates/items');
?>
</div>

<?php
	$this->load->view('pages/user/side');
	$this->load->view('templates/footer');
?>