<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Peminjaman</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Data Peminjaman</h4>
            <div class="card-header-action">
              <a href="<?= base_url('transaksi/pinjam'); ?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>No Pinjam</th>
                    <th>Nama Teknisi</th>
                    <th>Waktu Pinjam</th>
                    <th style="width:10%">Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($pinjam->result_array() as $isi) {
                    $id_anggota = $isi['id_anggota'];
                    $ang = $this->db->query("SELECT * FROM user WHERE nip = '$id_anggota'")->row();
                  ?>
                    <tr align="center">
                      <td><?= $no; ?></td>
                      <td><?= $isi['pinjam_id']; ?></td>
                      <td><?= $ang->nama; ?></td>
                      <td><?= $isi['tgl_pinjam']; ?></td>
                      <td>
                        <div class="badge badge-info"><?= $isi['status']; ?></div>
                      </td>
                      <td style="text-align:center;">
                        <?php if ($isi['tgl_kembali'] == '0') { ?>
                          <a href="<?= base_url('transaksi/kembalipinjam/' . $isi['pinjam_id']); ?>" class="btn btn-warning btn-sm" title="Kembalikan Barang">
                            <i class="fa fa-eye"></i></a>
                        <?php } else { ?>
                          <a href="javascript:void(0)" class="btn btn-success btn-sm" title="Kembalikan Barang">
                            <i class="fa fa-check"></i></a>
                        <?php } ?>
                        <a href="<?= base_url('transaksi/berita_acara/' . $isi['pinjam_id']); ?>" class="btn btn-primary btn-sm" title="Export BA">
                          <i class="fa fa-file-pdf"></i></a>
                        <a href="<?= base_url('transaksi/proses_pinjam?pinjam_id=' . $isi['pinjam_id']); ?>" id="AlertaEliminarCliente" class="btn btn-danger btn-sm" title="Hapus">
                          <i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>