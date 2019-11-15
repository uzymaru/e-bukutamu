<?php $this->load->view("v_atas.php") ?>
<?php $this->load->view("v_side.php") ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Form Buku Tamu</h1>
			</div>
		</div>
	</div>
</div>

<div class="content mt-3">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('barcode') ?>"><i class="ti-angle-double-left"></i> Back</a>
		</div>
		<div class="card-body">
			<!-- Form untuk Input qrcode -->
			<?php echo $info = $this->session->flashdata('info');
			echo form_open('barcode/generate',' id="form"');?>
			<div class="form-group">
				<label for="id">Id</label>
				<input type="text" class="form-control" id="id" name="id" placeholder="Id">
			</div>			

			<div class="form-group">
				<label for="kartu">Kartu</label>
				<input class="form-control <?php echo form_error('kartu') ? 'is-invalid':'' ?>"
				type="text" name="kartu" id="kartu" placeholder="Nama Kartu" />
				<div class="invalid-feedback">
					<?php echo form_error('kartu') ?>
				</div>
			</div>

			<button type="submit" class="btn btn-primary float-right fa fa-qrcode"> Generate</button></form>

			<div id="konf"></div>

		</div>
	</div>
	<?php $this->load->view("v_bawah.php") ?>

	