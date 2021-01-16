"use strict";

$("#swal-1").click(function() {
	swal('Hello');
});

$("#swal-2").click(function() {
	swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function() {
	swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function() {
	swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function() {
	swal('Good Job', 'You clicked the button!', 'error');
});

$("#swal-6").click(function() {
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Poof! Your imaginary file has been deleted!', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

// My Sweet Alert

const Berhasil = $('.berhasil').data('flashdata');
const Gagal = $('.gagal').data('flashdata');

if(Berhasil) {
    swal('Good Job', 'Data Berhasil ' + Berhasil, 'success');
}

if(Gagal) {
  swal('Good Job', 'Data Gagal ' + Gagal, 'warning');
}

// del-btn sweet alert
$(".del-btn").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((result) => {
      if (result.value) {
          document.location.href = href;
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

$("#swal-7").click(function() {
  swal({
    title: 'What is your name?',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Type your name',
      type: 'text',
    },
    },
  }).then((data) => {
    swal('Hello, ' + data + '!');
  });
});

$("#swal-8").click(function() {
  swal('This modal will disappear soon!', {
    buttons: false,
    timer: 3000,
  });
});