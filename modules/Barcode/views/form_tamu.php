<?php $this->load->view("v_atas.php") ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Anda</h1>
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
		<div class="card-body">
			<!-- Form untuk Edit tamu -->
			<form action="<?php base_url('guest/edit1') ?>" method="post" enctype="multipart/form-data" >
				<input type="hidden" name="id" value="<?php echo $guest->id ?>" />	
				<div class="form-group">
					<label for="nama">Nama</label>
					<input disabled="disabled" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
					type="text" name="nama" placeholder="Nama Tamu" value="<?php echo $guest->nama ?>"/>
					<div class="invalid-feedback">
						<?php echo form_error('nama') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="instansi">Instansi</label>
					<input disabled="disabled" class="form-control <?php echo form_error('instansi') ? 'is-invalid':'' ?>"
					type="text" name="instansi" min="0" placeholder="Instansi Tamu" value="<?php echo $guest->instansi ?>"/>
					<div class="invalid-feedback">
						<?php echo form_error('instansi') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="telp">No Telpon/HP</label>
					<input disabled="disabled" class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>"
					type="number" name="telp" min="0" placeholder="08XXXXXXXX" value="<?php echo $guest->telp ?>"/>
					<div class="invalid-feedback">
						<?php echo form_error('telp') ?>
					</div>
				</div>		

				<div class="form-group">
					<label for="person">Person</label><br>
					
					<input disabled="disabled" id="person2"  class="form-control <?php echo form_error('person') ? 'is-invalid':'' ?>"
					type="text" name="person" min="0" placeholder="Person" value="<?php echo $guest->person ?>"/>
					<div class="invalid-feedback">
						<?php echo form_error('person') ?>
					</div>
				</div>				

				<div class="form-group">
					<label for="keperluan">Keperluan</label>
					<textarea disabled="disabled" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?>"
						name="keperluan" placeholder="Keperluan..."><?php echo $guest->keperluan ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('keperluan') ?>
						</div>
					</div>

					<div class="form-group">
					<label for="idcard">Id Card Guest</label><br>
					<select disabled="disabled" id="id_card"name="id_card" class="form-control">
						<option><?php echo $guest->id_card ?></option>
					</select>
					<div class="invalid-feedback">
						<?php echo form_error('id_card') ?>
					</div>
				</div>

					<div class="form-group">
						<label for="foto">Photo</label>
						<br>
							<img src="<?php echo base_url('upload/guest/'.$guest->foto) ?>" width="320" height="240" />
						
						<div class="invalid-feedback">
							<?php echo form_error('foto') ?>
						</div>
					</div>
					</form>

				</div>
			</div>
			<?php $this->load->view("v_bawah.php") ?>