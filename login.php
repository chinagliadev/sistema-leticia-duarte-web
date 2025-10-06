<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- jQuery + Semantic UI JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <title>Login</title>
</head>

<body>
    <section class="container" id="container">
        <!-- FORMULÁRIO DE CADASTRO -->
        <div class="ui form form-container sign-up">
            <form action="auth.php" method="POST">
                <input type="hidden" name="acao" value="cadastro">
                <h1>Cadastro</h1>
                <label for="nameComplete" class="name">Nome Completo</label>
                <input type="text" name="nome" placeholder="Digite seu nome completo" id="nameComplete" required autocomplete="off">
                <label for="emailCad" class="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu E-mail" id="emailCad" required autocomplete="off">
                <label for="passwordCad" class="password">Senha</label>
                <div class="password-wrapper">
                    <input type="password" name="senha" placeholder="Digite sua Senha" id="passwordCad" required autocomplete="new-password">
                    <i class="bi bi-eye-slash toggle-password" data-target="#passwordCad"></i>
                </div>
                <label for="passwordConfirm" class="password">Confirmar senha</label>
                <div class="password-wrapper">
                    <input type="password" name="senha_confirm" placeholder="Digite novamente sua Senha" id="passwordConfirm" required autocomplete="new-password">
                    <i class="bi bi-eye-slash toggle-password" data-target="#passwordConfirm"></i>
                </div>
                <label for="celular" class="cell">Celular</label>
                <input type="text" name="celular" placeholder="(xx) xxxxx-xxxx" id="celular" required autocomplete="off">
                <label for="cpf" class="cpf">CPF</label>
                <input type="text" name="cpf" placeholder="000.000.000-00" id="cpf" required autocomplete="off">
                <button type="submit">Cadastrar</button>
                <p>Já tem uma conta? <a href="#" id="login">Faça o Login</a></p>
            </form>
        </div>

        <!-- FORMULÁRIO DE LOGIN -->
        <div class="form-container sign-in">
            <form action="auth.php" method="POST">
                <input type="hidden" name="acao" value="login">
                <h1>Login</h1>
                <label for="emailLogin" class="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu E-mail" id="emailLogin" required autocomplete="off">
                <label for="passwordLogin" class="password">Senha</label>
                <div class="password-wrapper">
                    <input type="password" name="senha" placeholder="Digite sua Senha" id="passwordLogin" required autocomplete="current-password">
                    <i class="bi bi-eye-slash toggle-password" data-target="#passwordLogin"></i>
                </div>
                <div class="checkPassword">
                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPassword" name="rememberMe">
                        <label for="checkboxPassword" class="lembrarMim">Lembrar de mim</label>
                    </div>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit">Entrar</button>
                <p>Ainda não tem uma conta? <a href="#" id="register">Faça o Cadastro</a></p>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle"></div>
        </div>
    </section>

    <!-- JS de Login -->
    <script src="./js/login.js"></script>
</body>

</html>