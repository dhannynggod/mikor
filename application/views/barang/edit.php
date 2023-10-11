<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('barang/proses_barang'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputKategori">Kategori</label>
                                <select id="inputKategori" class="form-control" name="kategori">
                                    <option selected>Choose...</option>
                                    <?php foreach ($kats as $isi) { ?>
                                        <option value="<?= $isi['id_kategori']; ?>" <?php if ($isi['id_kategori'] == $barang->id_kategori) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $isi['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nomor" name="serial_number" autocomplete="off" value="<?= $barang->serial_number; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Nama Barang</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Nama Barang" name="nama_barang" autocomplete="off" value="<?= $barang->nama_barang; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Tipe</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Tipe" name="tipe" autocomplete="off" value="<?= $barang->tipe; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nama Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="Nama Pendaftar" name="nama_daftar" autocomplete="off" value="<?= $barang->nama_daftar; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputSerialnumber">Nomor Pendaftar</label>
                                <input type="text" class="form-control" id="inputSerialnumber" placeholder="No Pendaftar" name="no_daftar" autocomplete="off" value="<?= $barang->no_daftar; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Email Pendaftar</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Email Pendaftar" name="email_daftar" autocomplete="off" value="<?= $barang->email_daftar; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputNamabarang">Password</label>
                                <input type="text" class="form-control" id="inputNamabarang" placeholder="Password" name="pass_daftar" autocomplete="off" value="<?= $barang->pass_daftar; ?>">
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="form-group col-md-6 mb-0">
                                <label for="inputFoto">Foto</label>
                                <input type="file" class="form-control" id="inputFoto" name="foto" autocomplete="off">
                                <?php if (!empty($barang->foto !== "0")) { ?>
                                    <br />
                                    <a href="<?= base_url('uploads/file/' . $barang->foto); ?>" target="_blank">
                                        <img src="<?= base_url('uploads/file/' . $barang->foto); ?>" style="width:354px;;height:472px;" class="img-responsive">
                                    </a>
                                <?php } else {
                                    echo '<br/><p style="color:red">* No Image</p>';
                                } ?>
                            </div>
                            <div class="form-group col-md-2 mb-0">
                                <label for="inputLabel">Label</label>
                                <input type="text" class="form-control" placeholder="Label Barang" id="inputLabel" name="label" autocomplete="off" value="<?= $barang->label; ?>">
                            </div>
                        </div>
                </div>


                <div class="card-footer">
                    <input type="hidden" name="edit" value="<?= $barang->id_barang; ?>">
                    <input type="hidden" name="fotoo" value="<?= $barang->foto; ?>">
                    <button class="btn btn-primary float-right" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>
</div>
</section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>