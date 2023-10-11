<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">MIKOR TA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">MT</a>
    </div>
    <ul class="sidebar-menu">
      <?php if ($this->session->userdata('status') == 'Logged') : ?>
        <li class="menu-header">Dashboard</li>
        <li class="<?php if ($page == 'Dashboard') {
                      echo 'active';
                    } ?>"><a class="nav-link" href="<?php echo base_url(); ?>login/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Starter</li>
        <li class="dropdown <?php if ($this->uri->uri_string() == 'transaksi') {
                              echo 'active';
                            } ?><?php if ($this->uri->uri_string() == 'transaksi/kembali') {
                                                                                                  echo 'active';
                                                                                                } ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Transaksi</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if ($this->uri->uri_string() == 'transaksi') {
                          echo 'active';
                        } ?>"><a class="nav-link" href="<?php echo base_url(); ?>transaksi">Peminjaman</a></li>
            <li class="<?php if ($this->uri->uri_string() == 'transaksi/kembali') {
                          echo 'active';
                        } ?>"><a class="nav-link" href="<?php echo base_url(); ?>transaksi/kembali">Pengembalian</a></li>
          </ul>
        </li>
        <li class="dropdown <?php if ($this->uri->uri_string() == 'barang') {
                              echo 'active';
                            } ?><?php if ($this->uri->uri_string() == 'barang/kategori') {
                                                                                                echo 'active';
                                                                                              } ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Barang</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if ($this->uri->uri_string() == 'barang') {
                          echo 'active';
                        } ?>"><a class="nav-link" href="<?php echo base_url(); ?>barang">List Barang</a></li>
            <li class="<?php if ($this->uri->uri_string() == 'barang/kategori') {
                          echo 'active';
                        } ?>"><a class="nav-link" href="<?php echo base_url(); ?>barang/kategori">Kategori</a></li>
          </ul>
        </li>
        <li class="<?php if ($page == 'Data Pengguna') {
                      echo 'active';
                    } ?>"><a class="nav-link" href="<?php echo base_url(); ?>user"><i class="far fa-square"></i> <span>Data Pengguna</span></a></li><?php endif; ?>
  </aside>
</div>