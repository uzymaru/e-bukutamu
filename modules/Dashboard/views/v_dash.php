<?php $this->load->view("v_atas.php") ?>
<?php $this->load->view("v_side.php") ?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
} else {
    base_url('login');
}
?>
<div class="content mt-3">

    <div class="content mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <!-- tabel tamu -->
                <table class="table table-hover" id="table_id" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Status</th>
                            <th>Id Card</th>
                            <th>Waktu Masuk</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>No.Telp/HP</th>
                            <th>Person</th>
                            <th>Keperluan</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(count($tamu)){
                            $count=0;
                            foreach ($tamu as $guest){ 
                                ?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td>
                                        <?php
                                        $status = $guest->status;
                                        $antri = $guest->antri;
                                        $sta = $guest->st_antri - 1;
                                        if ($status == 1) {
                                            ?>
                                            <a href="guest/update_status?sid=<?php echo $guest->id; ?>&sval=<?php echo $guest->status;?>" class="btn btn-success"> Active</a>
                                            <?php 
                                        } else if ($status == 2){
                                            ?> 
                                            <a href="#" class="btn btn-danger"> Disactive</a>
                                            <?php
                                        } else if ($status == 3){
                                            if ($antri > 0) {
                                                ?>
                                                <a href="#" class="btn btn-warning"> Queue Up</a> 
                                                <br><p>Antri = <?php echo $antri;?></p>
                                                <?php
                                            }else {
                                                ?> 
                                                <a href="guest/update_status?sid=<?php echo $guest->id; ?>&sval=<?php echo $guest->status; ?>&antri=<?php echo $antri;?>" class="btn btn-warning"> Queue Up</a> 
                                                <br><p>Antri = <?php echo $sta;?></p>
                                                <?php
                                            }}
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $guest->id_card ?>
                                        </td>
                                        <td>
                                            <?php echo $guest->tgl ?>
                                        </td>
                                        <td width="150">
                                            <?php echo $guest->nama ?>
                                        </td>
                                        <td>
                                            <?php echo $guest->instansi ?>
                                        </td>
                                        <td>
                                            <?php echo $guest->telp ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($guest->person == $guest->id_peg)) {
                                                echo $guest->nama_pegawai;
                                                ?>
                                                <br>
                                                <p>Durasi Bertemu : <?php echo $guest->dura; ?> Menit</p>
                                                <?php
                                            } else {
                                                echo $guest->person;
                                            } ?>

                                        </td>
                                        <td class="small">
                                            <?php echo substr($guest->keperluan, 0, 120) ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url('upload/guest/'.$guest->foto) ?>" width="64" />
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