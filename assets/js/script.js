$(function () {

  $('html').on('submit', 'form.form-wizard', function (e) {

    //Evito o comportamento padrão do evento submit.
    e.preventDefault();

    //recupero os elementos do meu formulário
    var form = $(this);
    //recupero a ação que será enviada para o controlador
    var formAction = form.data('action');
    //Recuperando todos os dados do formulario e transformo em string
    var formSerialize = form.serialize();
    var formButton = form.find('button');

    //Requisição Ajax para o controlador
    $.post('controller.php', {
      action: formAction,
      formSerialize
    }, function (data) {
      //data é o retorno do meu controlador 
      if (data.error === true) {
        $('.error').html("<p>Erro no app:" + data.errorMessage + "</p>").fadeIn();
      } else {
        $('.error').html('').fadeOut();
      }
      if (data.success === true) {
        //oculto o atual e exibe a próxima seção
        step(formButton);
      }
      if (data.finish === true) {
        window.location.href = data.redirect;
      }
    }, 'json');
    
  });

  //comportamento do botão de evento
  $('html').on('click', 'a[data-step]', function (event) {
    event.preventDefault;
    step($(this));
  });

  //Função responsavel por manipular ação de anterior
  function step(button) {
    $('.form-step:visible').fadeOut(200, function () {
      $('.' + button.data('step')).fadeIn(200);
    });
  }


});