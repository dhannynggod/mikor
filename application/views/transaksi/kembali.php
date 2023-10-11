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
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputNopinjam">No Peminjaman</label>
                                <input type="text" class="form-control" placeholder="No Peminjaman" name="nopinjam" value="<?= $pinjam->pinjam_id; ?>" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTanggalpinjam">Tanggal Pinjam</label>
                                <input type="text" class="form-control" name="tgl" value="<?= $pinjam->tgl_pinjam; ?>" placeholder="Tanggal Pinjam" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputTanggalpinjam">Tanggal Kembali</label>
                                <div class="form-control" readonly>
                                    <?php
                                    if ($pinjam->tgl_kembali == '0') {
                                        echo '<p style="color:red;">Belum Dikembalikan</p>';
                                    } else {
                                        echo $pinjam->tgl_kembali;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputTanggalpinjam">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" value="<?= $pinjam->nama_pelanggan; ?>" placeholder="Nama Pelanggan" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputTanggalpinjam">No Internet</label>
                                <input type="text" class="form-control" name="no_inet" value="<?= $pinjam->no_inet; ?>" placeholder="No Internet" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">No Tiket</label>
                                <input type="text" class="form-control" name="alamat_pelanggan" value="<?= $pinjam->no_tiket; ?>" placeholder="No Tiket" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">PIC Pelanggan</label>
                                <input type="text" class="form-control" name="no_pelanggan" value="<?= $pinjam->no_pelanggan; ?>" placeholder="PIC Pelanggan" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Alamat Pelanggan</label>
                                <input type="text" class="form-control" name="alamat_pelanggan" value="<?= $pinjam->alamat_pelanggan; ?>" placeholder="Alamat Pelanggan" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Lokasi Pemasangan</label>
                                <input type="text" class="form-control" name="lok_pasang" value="<?= $pinjam->lok_pasang; ?>" placeholder="Lokasi Pemasangan" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputTanggalpinjam">Alasan Pemasangan</label>
                                <input type="text" class="form-control" name="alasan_pasang" value="<?= $pinjam->alasan_pasang; ?>" placeholder="Alasan Pemasangan" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputIdanggota">Inputer</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" required autocomplete="off" name="id_anggota" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="<?= $pinjam->id_anggota; ?>" readonly>
                                </div></br>

                                <label for="inputbiodata4">Biodata Inputer</label>
                                <div>
                                    <?php
                                    $user = $this->M_Admin->get_tableid_edit('user', 'nip', $pinjam->id_anggota);
                                    error_reporting(0);
                                    if ($user->nama != null) {
                                        echo '<table class="table table-striped">
															<tr>
																<td>Nama Anggota</td>
																<td>:</td>
																<td>' . $user->nama . '</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td>:</td>
																<td>' . $user->telepon . '</td>
															</tr>
															<tr>
																<td>E-mail</td>
																<td>:</td>
																<td>' . $user->email . '</td>
															</tr>
															<tr>
																<td>Alamat</td>
																<td>:</td>
																<td>' . $user->alamat . '</td>
															</tr>
															<tr>
																<td>Level</td>
																<td>:</td>
																<td>' . $user->level . '</td>
															</tr>
														</table>';
                                    } else {
                                        echo 'Anggota Tidak Ditemukan !';
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputNomortelp">Barang</label>
                                <div class="input-group">
                                    <div class="form-control" readonly>
                                        <?php
                                        $pin = $this->M_Admin->get_tableid('pinjam', 'pinjam_id', $pinjam->pinjam_id);
                                        $no = 1;
                                        foreach ($pin as $isi) {
                                            $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                                            echo $no . '.' . $barang->label . '  ';
                                            $no++;
                                        }

                                        ?>
                                    </div>
                                </div>
                                </br>
                                <label for="inputNip">Data Barang</label>
                                <td>
                                    <div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($pin as $isi) {
                                                    $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= $barang->nama_barang; ?></td>
                                                        <td><?= $barang->label; ?></td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </div>
                        </div>
                </div>
                <div class="card-footer mb-0" align="right">
                    <a data-toggle="modal" data-target="#TableKembali" class="text-white btn btn-primary btn-md mb-0">
                        <i class="mb-0"></i> Kembalikan</a>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md mb-0">Back</a>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!--modal import -->
<div class="modal fade bd-example-modal-lg" id="TableKembali">
    <div class="modal-dialog modal-lg" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Peminjaman Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table class="table table-striped">
                    <tr>
                        <td>No Peminjaman</td>
                        <td>:</td>
                        <td>
                            <?= $pinjam->pinjam_id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tgl Peminjaman</td>
                        <td>:</td>
                        <td>
                            <?= $pinjam->tgl_pinjam; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>
                            <?= $pinjam->id_anggota; ?>
                            <?php
                            $user = $this->M_Admin->get_tableid_edit('user', 'id_anggota', $pinjam->id_anggota);
                            error_reporting(0);
                            if ($user->nama != null) {
                                echo ' ( ' . $user->nama . ' )';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengembalian</td>
                        <td>:</td>
                        <td>
                            <?= date('d-m-Y H:i:s'); ?> (Sekarang)
                        </td>
                    </tr>
                    <tr>
                        <td>Detail Barang</td>
                        <td>:</td>
                        <td>
                            <?php
                            $pin = $this->M_Admin->get_tableid('pinjam', 'pinjam_id', $pinjam->pinjam_id);
                            $no = 1;
                            foreach ($pin as $isi) {
                                $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                                echo $no . '. ' . $barang->label . ' ( ' . $barang->nama_barang . ' )<br/>';
                                $no++;
                            }

                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <a href="<?= base_url('transaksi/proses_pinjam?kembali=' . $pinjam->pinjam_id); ?>">
                        <button class="btn btn-primary">Proses Pengembalian</button></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--modal import -->
<?php $this->load->view('dist/_partials/footer'); ?>