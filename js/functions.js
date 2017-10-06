$(document).ready(function () {

   $('.btn-primary').click(function () {
       let fullName = $('#fullName').val();
       let whatsapp = $('#whatsapp').val();
       let termos = $('#termos').prop('checked');

       if (fullName === '') {
           $('#fullName').addClass('is-invalid');
       }else if (whatsapp === '') {
           $('#whatsapp').addClass('is-invalid');
       } else if (termos === true) {
           swal(
               'Good job!',
               'You clicked the button!',
               'success'
           );
       }
      //return false;
   });

    $('#span-termos').click(function () {
        $('#modal').on('show.bs.modal');
        console.log('span termos');
    });
});