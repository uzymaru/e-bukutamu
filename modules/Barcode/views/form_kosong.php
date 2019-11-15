<?php $this->load->view("v_atas.php") ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
			</div>
		</div>
	</div>
</div>

<div class="content mt-3 bg-dark">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<div class="card mb-3 bg-dark">
		<div class="card-body bg-dark">
			<!-- Form untuk Edit tamu -->
			<center>
				<img src="<?php echo base_url('images/logo.png')?>" alt="Logo">
				<font color="white" face="imprint mt shadow">
				<h1>Data Tamu Tidak Ada</h1>
				</font>
			</center>
		</div>
		<?php $this->load->view("v_bawah.php") ?>