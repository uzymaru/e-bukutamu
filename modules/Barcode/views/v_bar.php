<?php $this->load->view("v_atas.php") ?>
<?php $this->load->view("v_side.php") ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>QR-Code Generator</h1>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
} else {
	header("location: login");
}
?>
<div class="content mt-3">
    <div class="card-header">
        <a href="barcode/add"><i class="ti-plus"></i> Add New</a>
    </div>
    <div class="content mt-3">
      <div class="card-body">
         <div class="table-responsive">
            <!-- tabel tamu -->
            <table class="table table-striped table-bordered" id="table_id" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th width="30">No.</th>
                     <th width="50">ID</th>
							<th>Kartu</th><!-- 
							<th width="50">Generator</th>
							<th width="150">Hasil</th> -->
						</tr>
					</thead>
					<tbody>
                        <?php //penghitung jumlah tamu + nomer
                        if(count($bar)){
                        	$count=0;
                        	foreach ($bar as $qrcode){ 
                        		?>
                        		<tr>
                        			<td><?= ++$count; ?></td>
                        			<td>
                        				<?php echo $qrcode->id ?>
                        			</td>
                        			<td>
                        				<img src="<?php echo base_url('upload/qrcode/'.$qrcode->id.'.png') ?>" width="128" />
                        			</td>
                        		</tr>
                        		<?php 
                        	}
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php $this->load->view("v_bawah.php") ?>