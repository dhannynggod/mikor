<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data User</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('user/update'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNamalengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputNamalengkap" placeholder="Nama Lengkap" name="nama" value="<?= $user->nama; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">Tempat Lahir</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Tempat Lahir" name="tempat_lahir" value="<?= $user->tempat_lahir; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTanggallahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="inputTanggallahir" placeholder="Tempat Lahir" name="tgl_lahir" value="<?= $user->tgl_lahir; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?= $user->email; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNomortelp">No Telp</label>
                                <input type="text" class="form-control" id="inputNomortelp" placeholder="No Telepon" name="telepon" value="<?= $user->telepon; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNip">NIP (Nomor Induk Pegawai)</label>
                                <input type="text" class="form-control" id="inputNip" placeholder="NIP" name="nip" value="<?= $user->nip; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Alamat</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="alamat" value="<?= $user->alamat; ?>">
                            <input type="hidden" class="form-control" value="<?= $user->id_login; ?>" name="id_login">
                            <input type="hidden" class="form-control" value="<?= $user->foto; ?>" name="foto">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" value="<?= $user->username; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Diisi Bila Ingin Ganti Password">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputLevel">Level</label>
                                <select id="inputLevel" class="form-control" name="level">
                                    <option <?php if ($user->level == 'Supervisor') {
                                                echo 'selected';
                                            } ?>>Supervisor</option>
                                    <option <?php if ($user->level == 'Team Leader') {
                                                echo 'selected';
                                            } ?>>Team Leader</option>
                                             <option <?php if ($user->level == 'Teknisi') {
                                                echo 'selected';
                                            } ?>>Teknisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-4 mb-0">
                                <label for="inputJeniskelamain">Jenis Kelamin</label>
                                <select id="inputJeniskelamain" class="form-control" name="jenkel">
                                    <option <?php if ($user->jenkel == 'Laki-Laki') {
                                                echo 'checked';
                                            } ?>>Laki-Laki</option>
                                    <option <?php if ($user->jenkel == 'Perempuan') {
                                                echo 'checked';
                                            } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-0">
                                <label for="inputFoto">Foto (Max 2 MB)</label>
                                <br />
                                <input type="file" accept="image/*" name="foto">
                                <img src="<?= base_url('uploads/file/' . $user->foto); ?>" style="width:150px;;height:220px;" class="img-responsive" alt="#">
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>