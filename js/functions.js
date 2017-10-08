$(document).ready(function () {

   $('.btn-primary').click(function () {
       /*let fullName = $('#fullName').val();
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
       }*/
       $('input:required').addClass('is-invalid');
      //return false;
   });

    $('#span-termos').click(function () {
        $('#modal').on('show.bs.modal');
        console.log('span termos');
    });


    $('#register').submit(function (evt) {
        evt.preventDefault();
        let $form = $( this ),
            fullName = $form.find( "input[name='fullName']" ).val(),
            whatsApp = $form.find( "input[name='whatsApp']" ).val(),
            email = $form.find( "input[name='email']" ).val();

        // Send the data using post
        posting = $.post( 'php/cadastro.php', { fullName : fullName, whatsApp : whatsApp, email : email} );

        // Put the results in a div
        posting.done(function( data ) {
            let content = $( data ).find( "#content" );
            $( "#result" ).html(data);
            console.log(content);
        });

    });
});