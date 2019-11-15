<?php $this->load->view("_partials/v_atas.php") ?>
<?php $this->load->view("_partials/v_side.php") ?>
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
			<a href="<?php echo site_url('guest') ?>"><i class="ti-angle-double-left"></i> Back</a>
		</div>
		<div class="card-body">
			<!-- Form untuk Input tamu -->
			<form method="post" enctype="multipart/form-data" class="form-add">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
					type="text" name="nama" placeholder="Nama Tamu" />
					<div class="invalid-feedback">
						<?php echo form_error('nama') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="instansi">Instansi</label>
					<input class="form-control <?php echo form_error('instansi') ? 'is-invalid':'' ?>"
					type="text" name="instansi" min="0" placeholder="Instansi Tamu" />
					<div class="invalid-feedback">
						<?php echo form_error('instansi') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="telp">No Telpon/HP</label>
					<input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>"
					type="number" name="telp" min="0" placeholder="08XXXXXXXX" />
					<div class="invalid-feedback">
						<?php echo form_error('telp') ?>
					</div>
				</div>		

				<div class="form-group">
					<label for="person">Person</label><br>

					<input type="checkbox" id="check" onclick="Enableddl(this)" />Check For Use Select Option

					<select id="person"name="person" disabled="disabled" class="form-control">
						<option value='' selected Disabled>-- Select Person --</option>
					</select>
					
					<input id="person2"  class="form-control <?php echo form_error('person') ? 'is-invalid':'' ?>"
					type="text" name="person" min="0" placeholder="Person" />
					<div class="invalid-feedback">
						<?php echo form_error('person') ?>
					</div>
				</div>			

				<div class="form-group">
					<label for="keperluan">Keperluan</label>
					<textarea class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?>"
						name="keperluan" placeholder="Keperluan..."></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('keperluan') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="dura">Lama Bertemu (menit)</label>
						<input class="form-control md-8 <?php echo form_error('dura') ? 'is-invalid':'' ?>"
						type="number" name="dura" placeholder="Lama bertemu" /><span class="input-group-addon">mnt</span>
						<div class="invalid-feedback">
							<?php echo form_error('dura') ?>

						</div>
					</div>

					<div class="form-group">
						<label for="id_card">Id Card Guest</label><br>
						<select id="id_card"name="id_card" class="form-control">
							<option value='0' selected Disabled>-- Select Id Card --</option>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('id_card') ?>
						</div>
					</div>	

					<div class="form-group">
						<label for="cameraa">Photo</label>
						<div id="camera">Capture</div>

						<div id="cameraa">
							<input type=button value="Capture" onClick="preview()">
						</div>
						
					</div>

					<div id="simpan"><input type=button value="Remove" onClick="batal()">
						<!-- <button type="submit" class="btn btn-success" name="btn">Save</button> -->
						<input type="button" class="tombol-simpan" name="hehe" value="Save"  onclick="return sape()"/>
					</form>

					<div class="tampildata"></div>

				</div>
			</div>
			<?php $this->load->view("_partials/bawah.php") ?>