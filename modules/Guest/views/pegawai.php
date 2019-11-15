<?php $this->load->view("_partials/v_atas.php") ?>
<?php $this->load->view("_partials/v_side.php") ?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List Pegawai</h1>
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

<div class="content mt-3"><!-- 
    <div class="card-header">
        <a href="guest/add"><i class="ti-plus"></i> Add New</a>
    </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="table_id" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>NAMA</th>
                        <th>NIP</th>
                        <th>JABATAN</th>
                        <th>GOLONGAN</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($pegawai)){
                        $count=0;
                        foreach ($pegawai as $kar){ 
                            ?>
                            <tr>
                                <td align="center"><?= ++$count; ?></td>
                                <td>
                                    <?php echo $kar->nama ?>
                                </td>
                                <td>
                                    <?php echo $kar->nip ?>
                                </td>
                                <td align="center">
                                    <?php echo $kar->jabatan ?>
                                </td>
                                <td align="center">
                                    <?php echo $kar->gol ?>
                                </td>
                                <td align="center">
                                    <?php
                                    $status = $kar->status;
                                    if ($status == 1) {
                                        ?>
                                        <a href="#" class="btn btn-success"> Aktif</a>
                                        <?php 
                                    } else if ($status == 0){
                                        ?> 
                                        <a href="#" class="btn btn-danger"> Cuti/Pensiun</a>
                                        <?php
                                    }
                                    ?>
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