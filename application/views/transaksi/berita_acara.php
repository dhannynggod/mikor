<?php
$tanggal = date('D-m-Y');
$day = date('D', strtotime($tanggal));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);


$tgla = date('d-m-Y');
$bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
);

$array1 = explode("-", $tgla);
$tahun = $array1[2];
$bulan1 = $array1[1];
$hari = $array1[0];
$bl1 = $bulan[$bulan1];
$tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;
$tgl2 = $bl1 . ' Tahun ' . $tahun;

?>
<html>

<head>
    <title>BERITA ACARA PEMINJAMAN</title>
    <style>
        body {
            font-family: arial;
        }
    </style>
</head>

<body>
    <br />
    <br />
    <br />
    <h4 align="center">BERITA ACARA PEMINJAMAN
        <br />
        <br />
    </h4>
    <br />

    <table class="tabel_1" align="center">
        <tr>
            <td width="450" colspan="3" align="justify">Pada hari ini <?= $dayList[$day];?> Tanggal <?= $tgl1; ?> bertempat di Witel Semarang telah di lakukan kesepakatan dengan pelanggan dengan rincian :</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>Nama Pelanggan </td>
            <td>: <?= $pinjam->nama_pelanggan; ?></td>
        </tr>
        <tr>
            <td>Alamat Pelanggan </td>
            <td>: <?= $pinjam->alamat_pelanggan; ?></td>
        </tr>
        <tr>
            <td>No INET</td>
            <td>: <?= $pinjam->no_inet; ?></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td width="450" colspan="3">Adapun perangkat NTE yg dipinjam dengan rincian :</td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>Jenis Perangkat/nomor</td>
            <td>: <?php
                    $pin = $this->M_Admin->get_tableid('pinjam', 'pinjam_id', $pinjam->pinjam_id);
                    foreach ($pin as $isi) {
                        $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                        if ($barang->id_kategori == '2') {
                            echo '' . 'Orbit' . '  ' . '';
                        } elseif ($barang->id_kategori == '1') {
                            echo '' . 'Mikrotik' . '  ' . '';
                        };
                    }
                    ?></td>
        </tr>
        <tr>
            <td>Tipe Perangkat</td>
            <td>: <?php
                    $pin = $this->M_Admin->get_tableid('pinjam', 'pinjam_id', $pinjam->pinjam_id);
                    foreach ($pin as $isi) {
                        $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                        echo '' . $barang->tipe . '  ' . '';
                    }

                    ?> </td>
        </tr>
        <tr>
            <td>Serial Number </td>
            <td>: <?php
                    $pin = $this->M_Admin->get_tableid('pinjam', 'pinjam_id', $pinjam->pinjam_id);
                    foreach ($pin as $isi) {
                        $barang = $this->M_Admin->get_tableid_edit('barang', 'label', $isi['barang_id']);
                        echo '' . $barang->label . '  ' . '';
                    }

                    ?> </td>
        </tr>
        <tr>
            <td>Lokasi Pemasangan </td>
            <td>: <?= $pinjam->lok_pasang; ?></td>
        </tr>
        <tr>
            <td>Alasan Pemasangan </td>
            <td>: <?= $pinjam->alasan_pasang; ?></td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td width="450" colspan="3">Demikian Berita acara ini dibuat dan telah disepakati oleh masing masing pihak sebagaimana mestinya.</td>
        </tr>
        <tr>
            <td height="100"></td>
        </tr>
        <tr align="right">
            <td colspan="3">Semarang, <?= $tgl1; ?></td>
        </tr>
        <tr>
            <td width="175">
                <p>Teknisi,</p>
                <br />
                <br />

                <p><b>
                        <?php
                        $user = $this->M_Admin->get_tableid_edit('user', 'nip', $pinjam->id_anggota);
                        error_reporting(0);
                        if ($user->nama != null) {
                            echo $user->nama;
                        }
                        ?><br />
                        NIP <?= $pinjam->id_anggota; ?></b></p>
            </td>
            <td width="160">


            </td>
            <td width="115">

                <p>Pelanggan,</p>
                <br />
                <br />

                <p><b><?= $pinjam->nama_pelanggan; ?></b></p>

            </td>
        </tr>
    </table>

    <body>

</html>