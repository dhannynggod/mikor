<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<?php if ($this->session->userdata('status') == 'Logged') : ?>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?= base_url('User'); ?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Anggota</h4>
                </div>
                <div class="card-body">
                  <?php echo $dataPengguna->user ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?= base_url('Barang'); ?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Barang</h4>
                </div>
                <div class="card-body">
                  <?php echo $dataBarang->barang ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?= base_url('Transaksi'); ?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>DiPinjam</h4>
                </div>
                <div class="card-body">
                  <?php echo $dataPinjam->pinjam ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?= base_url('Transaksi/kembali'); ?>">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>DiKembalikan</h4>
                </div>
                <div class="card-body">
                  <?php echo $dataKembali->kembali ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
  </div>
<?php endif; ?>
<?php $this->load->view('dist/_partials/footer'); ?>