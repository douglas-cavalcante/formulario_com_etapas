$(function(){

  //form-wizard é meu seletor para manipular o formulário

  $("html").on("submit","form.form-wizard", function(e){

    //Evito o comportamento padrão do evento submit
    e.preventDefault();
    
    //recupero os elementos do meu formulário
    var form = $(this);
    //recupero a ação que será enviada para o controlador
    var formAction = form.data("action");
    console.log(formAction)
    //Recuperando todos os dados do formulario
    var formSerialize = form.serialize();

    //Requisição Ajax
    $.post("controller.php",{action: formAction, formSerialize},function(){
    }, "json");

  });

});