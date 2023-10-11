"use strict";

$("#AlertaEliminarCliente").on("click", function (e) {
  e.preventDefault();
  var href = $(this).attr("href");
  swal({
    title: "Yakin Ingin Hapus Data ?",
    text: "Data tidak akan bisa kembali",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Hapus",
    cancelButtonText: "Cancel",
    confirmButtonClass: "btn-danger",
    closeOnConfirm: false,
    closeOnCancel: false,
  }).then((result) => {
    if (result.value) {
      swal("Berhasil DiHapus", "Data Berhasil DiHapus", "success");
      setTimeout(function () {
        document.location.href = href;
      }, 1000);
    } else {
      swal("Cancel", "Data Gagal DiHapus", "error");
    }
  });
});
