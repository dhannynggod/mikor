<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Pengguna</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pengguna</h4>
              <div class="card-header-action">
                <a href="<?= base_url('user/tambah'); ?>" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah User</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table-1">
                  <thead>
                    <tr align="center">
                      <th width="5%">No</th>
                      <th>NIP</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($user as $isi) { ?>
                      <tr align="center">
                        <td><?= $no; ?></td>
                        <td><?= $isi['nip']; ?></td>
                        <td><?= $isi['nama']; ?></td>
                        <td><?= $isi['username']; ?></td>
                        <td><?= $isi['level']; ?></td>
                        <td>
                          <a href="<?= base_url('user/detail/' . $isi['id_login']); ?>" class="btn btn-primary"><i class="fa fa-eye text-white"></i></a>
                          <a href="<?= base_url('user/edit/' . $isi['id_login']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                          <a href="<?= base_url('user/del/' . $isi['id_login']); ?>">
                            <button id="AlertaEliminarCliente" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
    </div>
  </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>