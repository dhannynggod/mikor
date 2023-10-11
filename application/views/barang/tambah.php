<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Barang</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('barang/proses_barang'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputKategori">Kategori</label>
                                <select id="inputKategori" class="form-control" name="kategori" required>
                                    <option selected>Choose...</option>
                                    <?php foreach ($kats as $isi) { ?>
                                        <option value="<?= $isi['id_kategori']; ?>"><?= $isi['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nomor" name="serial_number" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputNamabarang">Nama Barang</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Nama Barang" name="nama_barang" autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputSerialnumber">Tipe</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Tipe" name="tipe" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nama Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nama Pendaftar" name="nama_daftar" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="No Pendaftar" name="no_daftar" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Email Pendaftar</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Email Pendaftar" name="email_daftar" autocomplete="off">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Password</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Password" name="pass_daftar" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-2 mb-0">
                                <label for="inputLabel">Label</label>
                                <input type="text" class="form-control" placeholder="Label Barang" id="inputLabel" name="label" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4 mb-0">
                                <label for="inputFoto">Foto</label>
                                <input type="file" class="form-control" id="inputFoto" name="foto" autocomplete="off">
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <input type="hidden" name="tambah" value="tambah">
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>