<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Ajax Search data inputer -->
<script>
  $(".fileSelection1 #Select_File1").click(function(e) {
    document.getElementsByName('id_anggota')[0].value = $(this).attr("data_id");
    $('#TableAnggota').modal('hide');
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('transaksi/result'); ?>",
      data: 'kode_anggota=' + $(this).attr("data_id"),
      beforeSend: function() {
        $("#result").html("");
        $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
      },
      success: function(html) {
        $("#result").html(html);
        $("#result_tunggu").html('');
      }
    });
  });
</script>

<script>
  // AJAX call for autocomplete 
  $(document).ready(function() {
    $("#search-box").keyup(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/result'); ?>",
        data: 'kode_anggota=' + $(this).val(),
        beforeSend: function() {
          $("#result").html("");
          $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function(html) {
          $("#result").html(html);
          $("#result_tunggu").html('');
        }
      });
    });
  });
</script>

<!-- Ajax Search data barang -->
<script>
  $(".fileSelection1 #Select_File2").click(function(e) {
    document.getElementsByName('barang_id')[0].value = $(this).attr("data_id");
    $('#TableBarang').modal('hide');
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('transaksi/barang'); ?>",
      data: 'kode_barang=' + $(this).attr("data_id"),
      beforeSend: function() {
        $("#result_barang").html("");
        $("#result_tunggu_barang").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
      },
      success: function(html) {
        $("#result_barang").load("<?= base_url('transaksi/barang_list'); ?>");
        $("#result_tunggu_barang").html('');
      }
    });
  });
</script>

<script>
  // AJAX call for autocomplete 
  $(document).ready(function() {
    $("#barang-search").keyup(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('transaksi/barang'); ?>",
        data: 'kode_barang=' + $(this).val(),
        beforeSend: function() {
          $("#result_tunggu_barang").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
        },
        success: function(html) {
          $("#result_barang").load("<?= base_url('transaksi/barang_list'); ?>");
          $("#result_tunggu_barang").html('');
        }
      });
    });
  });
</script>

<!-- JS Libraies -->
<script src="<?= base_url(); ?>assets/modules/sweetalert/sweetalert2.all.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>

<!-- Template JS File -->
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>