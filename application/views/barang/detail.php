<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputKategori">Kategori</label>
                                <select id="inputKategori" class="form-control" name="kategori" readonly>
                                    <?php foreach ($kats as $isi) { ?>
                                        <option value="<?= $isi['id_kategori']; ?>" <?php if ($isi['id_kategori'] == $barang->id_kategori) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $isi['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nomor" name="serial_number" autocomplete="off" value="<?= $barang->serial_number; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Nama Barang</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Nama Barang" name="nama_barang" autocomplete="off" value="<?= $barang->nama_barang; ?>" readonly>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputSerialnumber">Tipe</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Tipe" name="tipe" autocomplete="off" value="<?= $barang->tipe; ?>" readonly>
                            </div>
                            <div class="form-group col-md-2 mb-0">
                                <label for="inputLabel">Label</label>
                                <input type="text" class="form-control" placeholder="Label Barang" id="inputLabel" name="label" autocomplete="off" value="<?= $barang->label; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nama Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nama Pendaftar" name="nama_daftar" autocomplete="off" value="<?= $barang->nama_daftar; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="No Pendaftar" name="no_daftar" autocomplete="off" value="<?= $barang->no_daftar; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Email Pendaftar</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Email Pendaftar" name="email_daftar" autocomplete="off" value="<?= $barang->email_daftar; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Password</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Password" name="pass_daftar" autocomplete="off" value="<?= $barang->pass_daftar; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-2 mb-0">
                                <label for="inputFoto">Foto</label>
                                <?php if (!empty($barang->foto !== "0")) { ?>
                                    <br />
                                    <a href="<?= base_url('uploads/file/' . $barang->foto); ?>" target="_blank">
                                        <img src="<?= base_url('uploads/file/' . $barang->foto); ?>" style="width:auto;height:auto;" class="img-responsive">
                                    </a>
                                <?php } else {
                                    echo '<br/><p style="color:red">* No Image</p>';
                                } ?>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
</div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>