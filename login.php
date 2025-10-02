<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <!-- jQuery + Semantic UI JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <title>Login</title>
</head>

<body>
    <?php if (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Usuário ou senha incorretos!
            </div>
        </div>
    <?php endif; ?>

    <section class="container" id="container">
        <div class="ui form form-container sign-up">
            <form action="auth.php" method="POST">
                <input type="hidden" name="acao" value="cadastro">
                <h1>Cadastro</h1>
                <label for="nameComplete" class="name">Nome Completo</label>
                <input type="text" name="nome" placeholder="Digite seu nome completo" id="nameComplete" required>
                <label for="email" class="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu E-mail" id="emailCad" required>
                <label for="password" class="password">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua Senha" id="passwordCad" required>
                <label for="passwordConfirm" class="password">Confirmar senha</label>
                <input type="password" name="senha_confirm" placeholder="Digite novamente sua Senha" id="passwordConfirm" required>
                <label for="celular" class="cell">Celular</label>
                <input type="text" name="celular" placeholder="(xx) xxxxx-xxxx" id="celular" required>
                <label for="cpf" class="cpf">CPF</label>
                <input type="text" name="cpf" placeholder="000.000.000-00" id="cpf" required>
                <button>Cadastrar</button>
                <p>Já tem uma conta? <a href="#" id="login">Faça o Login</a></p>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="auth.php" method="POST">
                <input type="hidden" name="acao" value="login">
                <h1>Login</h1>
                <label for="emailLogin" class="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu E-mail" id="emailLogin" required>
                <label for="passwordLogin" class="password">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua Senha" id="passwordLogin" required>
                <div class="checkPassword">
                    <div class="checkbox">
                        <input type="checkbox" id="checkboxPassword">
                        <label for="checkboxPassword" class="lembrarMim">Lembrar de mim</label>
                    </div>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button>Entrar</button>
                <p>Ainda não tem uma conta? <a href="#" id="register">Faça o Cadastro</a></p>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
            </div>
        </div>
    </section>

    <script src="./js/login.js"></script>

</body>

</html>