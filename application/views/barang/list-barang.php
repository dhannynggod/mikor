<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>List Orbit & Mikrotik</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>List Barang</h4>
            <div class="card-header-action">
              <a title="Tambah Barang" href="<?= base_url('barang/tambah_barang'); ?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Input Barang</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table-1">
                <thead>
                  <tr align="center">
                    <th width="5%">No</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Label</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($barang->result_array() as $isi) {
                    $id_kategori = $isi['id_kategori'];
                    $kat = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'")->row(); ?>
                    <tr align="center">
                      <td><?= $no; ?></td>
                      <td><?= $kat->nama_kategori; ?></td>
                      <td><?= $isi['tipe']; ?></td>
                      <td><?= $isi['label']; ?></td>
                      <td>
                        <a title="Detail" href="<?= base_url('barang/detail/' . $isi['id_barang']); ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                        <a title="Edit" href="<?= base_url('barang/edit_barang/' . $isi['id_barang']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                        <a id="AlertaEliminarCliente" title="Hapus" href="<?= base_url('barang/proses_barang?barang_id=' . $isi['id_barang']); ?>">
                          <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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