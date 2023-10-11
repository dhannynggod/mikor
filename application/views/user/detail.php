<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pengguna</h1>
        </div>
        <div class="container rounded bg-white">
            <div class="row">
                <div class="col-md-4 border-right mb-0">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><?php if (!empty($user->foto !== "0")) { ?>
                            <br />
                            <a href="<?= base_url('uploads/file/' . $user->foto); ?>" target="_blank">
                                <img src="<?= base_url('uploads/file/' . $user->foto); ?>" style="width:150px;;height:220px;" class="img-responsive">
                            </a>
                        <?php } else {
                                                                                                echo '<br/><p style="color:red">* No Image</p>';
                                                                                            } ?></br><span class="font-weight-bold"><?= $user->username; ?></span><span class="text-black-50"><?= $user->email; ?></span><span> </span>
                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-3"><label class="labels">Nama Lengkap</label><input type="text" class="form-control" placeholder="first name" value="<?= $user->nama; ?>" readonly></div>
                            <div class="col-md-6 "><label class="labels">Username</label><input type="text" class="form-control" value="<?= $user->username; ?>" placeholder="username" readonly></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3"><label class="labels">No Telepon</label><input type="text" class="form-control" placeholder="enter phone number" value="<?= $user->telepon; ?>" readonly></div>
                            <div class="col-md-6 mb-3"><label class="labels">Jenis Kelamin</label><input type="text" class="form-control" placeholder="enter phone number" value="<?= $user->jenkel; ?>" readonly></div>
                            <div class="col-md-12 mb-3"><label class="labels">Alamat</label><input type="text" class="form-control" placeholder="enter address" value="<?= $user->alamat; ?>" readonly></div>
                            <div class="col-md-12 mb-2"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email id" value="<?= $user->email; ?>" readonly></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 mb-3"><label class="labels">NIP (Nomor Induk Pegawai)</label><input type="text" class="form-control" value="<?= $user->nip; ?>" placeholder="username" readonly></div>
                            <div class="col-md-6"><label class="labels">Jabatan</label><input type="text" class="form-control" placeholder="education" value="<?= $user->level; ?>" readonly></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3"><label class="labels">Tempat Lahir</label><input type="text" class="form-control" placeholder="country" value="<?= $user->tempat_lahir; ?>" readonly></div>
                            <div class="col-md-6"><label class="labels">Tanggal Lahir</label><input type="text" class="form-control" value="<?= $user->tgl_lahir; ?>" placeholder="state" readonly></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>