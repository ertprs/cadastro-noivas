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
       $('input:invalid').addClass('is-invalid');
      //return false;
   });

    $('#span-termos').click(function () {
        $('#modal').on('show.bs.modal');
        swal(
            'Termos Wedding Grupo.',
            'A finalidade do Wedding Grupo é reunir o máximo de pessoas voltadas para a área de casamento. Tanto fornecedores quanto clientes.\n' +
            'As promoções e ofertas postadas no grupo serão EXCLUSIVAS para usuários do grupo.\n' +
            'Todos os conteúdos postados no Wedding Grupo devem ser relacionados a casamento. Qualquer postagem irrelevante será notificada e caso aconteça uma segunda vez o usuário será excluído do grupo sem aviso prévio.\n' +
            'Uma vez excluído o usuário não poderá participar do grupo novamente. Sendo assim, ficará fora das novas promoções e ofertas.\n' +
            'Caso o usuário excluído seja participante de alguma promoção ou oferta, continuará valendo o pacote fechado.',
            'info'
        )
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
            //$( "#result" ).html(data);
            //console.log(data);
            if (data) {
                txt = JSON.parse(data);
                //console.log(txt.lastId);
                if (txt.lastId > 0) {
                    swal(
                        'Muito Obrigado!',
                        'Cadastrado com sucesso!',
                        'success'
                    );
                    $('#register')[0].reset();
                }
            }
        });

    });
});