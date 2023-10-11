<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kategori</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12 mb-0">
          <div class="row">
            <div class="col-sm-4 mb-0">
              <div class="box box-primary mb-0">
                <div class="box-header with-border mb-0">
                  <?php if (!empty($this->input->get('id'))) { ?>
                    <h4> Edit Kategori</h4></br>
                  <?php } else { ?>
                    <h4> Tambah Kategori</h4></br>
                  <?php } ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body mb-0">
                  <?php if (!empty($this->input->get('id'))) { ?>
                    <form method="post" action="<?= base_url('barang/katproses'); ?>">
                      <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="kategori" value="<?= $kat->nama_kategori; ?>" id="kategori" class="form-control" autocomplete="off" placeholder="Contoh : Mikrotik" required>
                      </div>
                      <br />
                      <input type="hidden" name="edit" value="<?= $kat->id_kategori; ?>">
                      <button type="submit" class="btn btn-primary"> Update</button>
                    </form>
                  <?php } else { ?>
                    <form method="post" action="<?= base_url('barang/katproses'); ?>">
                      <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control mb-0" autocomplete="off" placeholder="Contoh : Mikrotik" required>

                      </div>
                      <br />
                      <input type="hidden" name="tambah" value="tambah">
                      <button type="submit" class="btn btn-primary mb-0"> <i class="fa fa-plus"></i> Tambah Kategori</button>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table-bordered table-striped table" width="100%" id="table-1">
                      <thead>
                        <tr align="center">
                          <th width="5%">No</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($kategori->result_array() as $isi) { ?>
                          <tr align="center">
                            <td><?= $no; ?></td>
                            <td><?= $isi['nama_kategori']; ?></td>
                            <td style="width:20%;">
                              <a href="<?= base_url('barang/katproses?kat_id=' . $isi['id_kategori']); ?>">
                                <button id="AlertaEliminarCliente" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
      </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>