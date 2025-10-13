<?php
include './config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id = $_SESSION['usuario']['id'] ?? null;

$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">
    <link rel="stylesheet" href="./css/sistema.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php include './template/menuLateral.php' ?>

        <main class="conteudo_cadastrados">
            <section class="cabecalho_cadastrados">
                <h2>Perfil do Usuário</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="Logo Leiticia Duarte">
            </section>

            <section class="sessao_cadastro ui segment blue">
                <?php if ($usuario): ?>
                    <div class="ui two column stackable grid">
                        <div class="column">
                            <div class="ui card fluid">
                                <div class="content">
                                    <a class="header"><?= htmlspecialchars($usuario['nome']) ?></a>
                                    <div class="meta">
                                        <span>ID: <?= htmlspecialchars($usuario['id_funcionario']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <form class="ui form" method="POST" action="salvarPerfil.php" id="formPerfil">
                                <div class="field">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>Celular</label>
                                    <input type="text" id="celular" name="celular" value="<?= htmlspecialchars($usuario['celular']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>CPF</label>
                                    <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" readonly required>
                                </div>

                                <!-- Mensagem de erro do Semantic -->
                                <div class="ui error message"></div>

                                <input type="hidden" name="id_funcionario" value="<?= $usuario['id_funcionario'] ?>">

                                <div class="ui divider"></div>
                                <button class="ui primary button" type="button" id="editarPerfil">
                                    <i class="edit icon"></i> Editar Perfil
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="ui negative message">
                        <div class="header">Usuário não encontrado!</div>
                        <p>Verifique se está logado corretamente.</p>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </section>

    <script>
        // Máscaras
        $('#celular').mask('(00) 00000-0000');
        $('#cpf').mask('000.000.000-00');

        // Função de validação do CPF
        function validarCPF(cpf) {
            cpf = cpf.replace(/\D/g, "");
            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;
            for (let j = 9; j < 11; j++) {
                let soma = cpf
                    .slice(0, j)
                    .split("")
                    .reduce((acc, n, i) => acc + n * (j + 1 - i), 0);
                let resto = (soma * 10) % 11 % 10;
                if (resto != cpf[j]) return false;
            }
            return true;
        }

        // Validação do formulário Semantic UI
        $('#formPerfil').form({
            fields: {
                nome: {
                    identifier: 'nome',
                    rules: [{
                        type: 'empty',
                        prompt: 'O nome não pode ficar em branco.'
                    }]
                },
                email: {
                    identifier: 'email',
                    rules: [{
                        type: 'regExp[/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$/]',
                        prompt: 'Insira um e-mail válido (ex: usuario@dominio.com).'
                    }]
                },
                celular: {
                    identifier: 'celular',
                    rules: [{
                        type: 'regExp[/^\\(\\d{2}\\) \\d{5}-\\d{4}$/]',
                        prompt: 'Digite o celular completo no formato (99) 99999-9999.'
                    }]
                },
                cpf: {
                    identifier: 'cpf',
                    rules: [
                        {
                            type: 'regExp[/^\\d{3}\\.\\d{3}\\.\\d{3}-\\d{2}$/]',
                            prompt: 'Digite um CPF no formato correto 000.000.000-00.'
                        },
                        {
                            type: 'callback',
                            callback: function(value) {
                                return validarCPF(value);
                            },
                            prompt: 'CPF inválido!'
                        }
                    ]
                }
            },
            inline: true,
            on: 'blur'
        });

        // Botão editar/salvar
        $('#editarPerfil').on('click', function() {
            const inputs = $('input[name]:not([type="hidden"])');
            const isEditing = !inputs.prop('readonly');

            if (isEditing) {
                if ($('#formPerfil').form('is valid')) {
                    $('#formPerfil').submit();
                } else {
                    $('#formPerfil').form('validate form');
                }
            } else {
                inputs.prop('readonly', false);
                $(this)
                    .removeClass('primary')
                    .addClass('green')
                    .html('<i class="save icon"></i> Salvar');
            }
        });
    </script>
</body>

</html>
