<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pinjam</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('transaksi/proses_pinjam'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNopinjam">No Peminjaman</label>
                                <input type="text" class="form-control" placeholder="No Peminjaman" name="nopinjam" value="<?= $nop; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Tanggal Pinjam</label>
                                <input type="text" class="form-control" name="tgl" value="<?= date('d-m-Y H:i:s'); ?>" placeholder="Tanggal Pinjam">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputTanggalpinjam">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTanggalpinjam">No Internet</label>
                                <input type="text" class="form-control" name="no_inet" placeholder="No Internet">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">No Tiket</label>
                                <input type="text" class="form-control" name="no_tiket" placeholder="No Tiket">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">PIC Pelanggan</label>
                                <input type="text" class="form-control" name="no_pelanggan" placeholder="PIC Pelanggan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Alamat Pelanggan</label>
                                <input type="text" class="form-control" name="alamat_pelanggan" placeholder="Alamat Pelanggan">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Lokasi Pemasangan</label>
                                <input type="text" class="form-control" name="lok_pasang" placeholder="Lokasi Pemasangan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Alasan Pemasangan</label>
                                <input type="text" class="form-control" name="alasan_pasang" placeholder="Alasan Pemasangan">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputIdanggota">Peminjam</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" required autocomplete="off" name="id_anggota" id="search-box" placeholder="Search by NIP 6 Digit (666666)" type="text" value="">
                                    <span class="input-group-btn">
                                        <a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search text-white"></i></a>
                                    </span>
                                </div></br>

                                <label for="inputbiodata4">Biodata Peminjam</label>
                                <div id="result_tunggu">
                                    <p style="color:red">* Belum Ada Hasil</p>
                                </div>
                                <div id="result"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputNomortelp">Barang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" autocomplete="off" name="barang_id" id="barang-search" placeholder="Search By Label OR/MK-111" type="text" value="">
                                    <span class="input-group-btn">
                                        <a data-toggle="modal" data-target="#TableBarang" class="btn btn-primary"><i class="fa fa-search text-white"></i></a>
                                    </span>
                                </div>
                                </br>
                                <label for="inputNip">Data Barang</label>
                                <td>
                                    <div id="result_tunggu_barang">
                                        <p style="color:red">* Belum Ada Hasil</p>
                                    </div>
                                    <div id="result_barang"></div>
                                </td>
                            </div>
                        </div>
                </div>
                <div class="card-footer mb-0">
                    <input type="hidden" name="tambah" value="tambah">
                    <button class="btn btn-primary mb-0 float-right">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!--modal import -->
<div class="modal fade bd-example-modal-lg" id="TableAnggota">
    <div class="modal-dialog modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TableAnggota">Data Inputer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table id="table-1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenkel</th>
                            <th>Telepon</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $isi) {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $isi['nip']; ?></td>
                                <td><?= $isi['nama']; ?></td>
                                <td><?= $isi['jenkel']; ?></td>
                                <td><?= $isi['telepon']; ?></td>
                                <td><?= $isi['level']; ?></td>
                                <td style="width:20%;">
                                    <button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['nip']; ?>">
                                        <i class="fa fa-check"> </i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade bd-example-modal-lg" id="TableBarang">
    <div class="modal-dialog modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TableBarang">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table id="table-2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Serial Number</th>
                            <th>Nama Barang</th>
                            <th>Label</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang->result_array() as $isi) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $isi['serial_number']; ?></td>
                                <td><?= $isi['nama_barang']; ?></td>
                                <td><?= $isi['label']; ?></td>
                                <td style="width:17%">
                                    <button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['label']; ?>">
                                        <i class="fa fa-check"> </i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--modal import -->
<?php $this->load->view('dist/_partials/footer'); ?>