<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pengembalian</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Data Pengembalian</h4>
            <div class="card-header-action">
              <a title="Export Excel" href="<?= base_url('transaksi/export'); ?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Export Excel</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th style="width:10%">No Pinjam</th>
                    <th style="width:11%">NIP</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
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
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $isi['pinjam_id']; ?></td>
                      <td><?= $isi['id_anggota']; ?></td>
                      <td><?= $ang->nama; ?></td>
                      <td><?= $isi['tgl_pinjam']; ?></td>
                      <td>
                        <?php
                        if ($isi['tgl_kembali'] == '0') {
                          echo '<p style="color:red;">belum dikembalikan</p>';
                        } else {
                          echo $isi['tgl_kembali'];
                        }

                        ?>
                      </td>
                      <td>
                        <div class="badge badge-info"><?= $isi['status']; ?></div>
                      </td>
                      </td>
                      <td>

                        <a href="<?= base_url('transaksi/detail_kembali/' . $isi['pinjam_id']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
                          <i class="fa fa-eye"></i></button></a>

                        <a href="<?= base_url('transaksi/proses_pinjam?pinjam_id=' . $isi['pinjam_id']); ?>" id="AlertaEliminarCliente" class="btn btn-danger btn-sm" title="hapus pinjam">
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