"use strict";

// My Sweet Alert

const Berhasil = $('.berhasil').data('flashdata');
const Gagal = $('.gagal').data('flashdata');

if(Berhasil) {
    swal('Good Job', 'Data Berhasil ' + Berhasil, 'success');
}

if(Gagal) {
  swal('Error', 'Data Gagal ' + Gagal, 'warning');
}

// del-btn sweet alert
$(".del-btn").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((result) => {
      if (result) {
          document.location.href = href;
      } else {
        swal('Your file is safe!');
      }
  });
});

$('.logout').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');
  swal({
    title: 'Ready to Leave?',
    text: 'Select "Ok" below if you are ready to end your current session',
    icon: 'warning',
    buttons: true,
    dangerMode: true
  }).then( (logout) => {
    if (logout) {
      document.location.href = href;
    }
  });
});
