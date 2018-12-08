<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Wizard</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container-full">
    <div class="content">

        <div class="box-header">
            <p>Formulário Wizard</p>
        </div>

        <div class="box-content">

            <div class="error" style="display:none"><p>Mensagem de Erro</p></div>

            <div class="data-user form-step">
                <form action="" method="post" autocomplete="off" class="form-wizard" data-action="data-user">

                    <h1>Dados do Usuário</h1>

                    <div class="form-group">
                        <div>
                            <label for="user_name">Nome</label>
                            <input type="text" name="user_name" id="user_name" placeholder="Insira seu nome">
                        </div>
                        <div>
                            <label for="user_lastname">Sobrenome</label>
                            <input type="text" name="user_lastname" id="user_lastname" placeholder="Insira seu sobrenome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="user_document">CPF</label>
                        <input type="text" name="user_document" id="user_document" placeholder="Insira o documento">
                    </div>

                    <div class="form-group">
                        <button class="btn btn_blue" data-step="data-login">&raquo; Próximo</button>
                    </div>

                </form>

            </div>

            <div class="data-login form-step" style="display:none">

                <form action="" method="post" autocomplete="off" class="form-wizard" data-action="data-login">

                    <h1>Dados de Login</h1>

                    <div class="form-group">
                        <label for="user_email">E-mail</label>
                        <input type="email" name="user_email" id="user_email" placeholder="Insira seu e-mail">
                    </div>

                    <div class="form-group">
                        <label for="user_password">Senha</label>
                        <input type="password" name="user_password" id="user_password" placeholder="Insira uma senha">
                    </div>

                    <div class="form-group">
                        <a class="btn btn_blue" data-step="data-user"">&laquo; Anterior</a>
                        <button class="btn btn_blue" data-step="data-social">&raquo; Próximo</button>
                    </div>

                </form>

            </div>

            <div class="data-social form-step" style="display:none">

                <form action="" method="post" autocomplete="off" class="form-wizard" data-action="data-social">

                    <h1>Social</h1>

                    <div class="form-group">
                        <label for="user_facebook">Facebook</label>
                        <input type="text" name="user_facebook" id="user_facebook" placeholder="Link para o Facebook">
                    </div>

                    <div class="form-group">
                        <label for="user_website">Site</label>
                        <input type="text" name="user_website" id="user_website" placeholder="Link para o WebSite">
                    </div>

                    <div class="form-group">
                        <a class="btn btn_blue" data-step="dataUser">&laquo; Anterior</a>
                        <button class="btn btn_blue">&check; Finalizar Cadastro</button>
                    </div>

                </form>

            </div>

        </div>
        <div class="box-footer"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>