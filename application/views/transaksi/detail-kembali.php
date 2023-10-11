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
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>