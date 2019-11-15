<?php $this->load->view("_partials/v_atas.php") ?>
<?php $this->load->view("_partials/v_side.php") ?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List Buku Tamu</h1>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning')): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php endif; ?>


<div class="content mt-3">
    <div class="card-header">
        <a href="guest/add"><i class="ti-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($tamu)){
                        $count=0;
                        foreach ($tamu as $guest){ 
                            ?>
                            <tr>
                                <td align="center"><?= ++$count; ?></td>
                                <td align="center" width="100">
                                    <?php
                                    $status = $guest->status;
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
                                    <td width="100" align="center">
                                        <?php echo $guest->id_card ?>
                                    </td>
                                    <td width="150">
                                        <?php echo date('d F Y h:i a', strtotime($guest->tgl)) ?>
                                    </td>
                                    <td width="150">
                                        <?php echo $guest->nama ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $guest->instansi ?>
                                    </td>
                                    <td>
                                        <?php echo $guest->telp ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (!empty($guest->person == $guest->id_peg )) {
                                            if ($guest->status==1) {
                                                echo $guest->nama_pegawai;
                                                ?>
                                                <br>
                                                <p>Durasi Bertemu : <?php echo $guest->dura; ?> Menit</p>
                                                <?php
                                            } else {
                                                echo $guest->nama_pegawai;
                                            }
                                        } else {
                                            echo $guest->person;
                                        } ?>

                                    </td>
                                    <td class="small">
                                        <?php echo substr($guest->keperluan, 0, 120) ?></td>
                                        <td>
                                            <img src="<?php echo base_url('upload/guest/'.$guest->foto) ?>" width="64" />
                                        </td>
                                        <td width="80" align="center">
                                            <a href="<?php echo site_url('guest/edit/'.$guest->id) ?>"><button class="btn btn-primary btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></button></a>

                                                <a title="Hapus" data-placement="right" data-toggle="modal" href="#myModal" onclick="set_url('<?php echo site_url('guest/delete/'.$guest->id) ?>');"><button class="btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-trash"></span></button></a>
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
                <?php $this->load->view("_partials/v_bawah.php") ?>