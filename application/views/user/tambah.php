<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Anggota</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Anggota</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('user/add'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNamalengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputNamalengkap" placeholder="Nama Lengkap" name="nama" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">Tempat Lahir</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Tempat Lahir" name="tempat_lahir" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTanggallahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="inputTanggallahir" placeholder="Tempat Lahir" name="tgl_lahir" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNomortelp">No Telp</label>
                                <input type="text" class="form-control" id="inputNomortelp" placeholder="No Telepon" name="telepon" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNip">NIP (Nomor Induk Pegawai)</label>
                                <input type="text" class="form-control" id="inputNip" placeholder="NIP" name="nip" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Alamat</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="alamat" required autocomplete="off">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputLevel">Level</label>
                                <select id="inputLevel" class="form-control" name="level" required autocomplete="off">
                                    <option selected>Choose...</option>
                                    <option>Supervisor</option>
                                    <option>Team Leader</option>
                                    <option>Teknisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-4 mb-0">
                                <label for="inputJeniskelamain">Jenis Kelamin</label>
                                <select id="inputJeniskelamain" class="form-control" name="jenkel" required autocomplete="off">
                                    <option selected>Choose...</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-0">
                                <label for="inputFoto">Foto (Max 2 MB)</label>
                                <input type="file" class="form-control" id="inputFoto" name="foto" required autocomplete="off">
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary float-right">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>