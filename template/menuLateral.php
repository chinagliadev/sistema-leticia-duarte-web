<aside class="menu_lateral">
    <section class="opcoes_menu">

        <div class="perfil" onclick="window.location.href='perfil.html'">
            <img class="ui avatar image" src="./img/apresentacao_img/Logo Leiticia Duarte.png" alt="">

            <span class="usuario-info">
                <span class="usuario-nome"><strong>Admin</strong></span><br>
                <span class="usuario-email">Admin@email.com</span>
            </span>
        </div>

        <div class="lista_opcoes">
            <ul>
                <li><i class="home icon"></i><a href="cadastrados.php">Início</a></li>
                <li><i class="chart bar outline icon"></i><a href="cadastros.php">Cadastrar</a></li>
                <li><i class="history icon"></i><a href="">Histórico</a></li>
            </ul>
        </div>
    </section>

    <section class="container_sair">
        <a href="#"><i class="sign-out icon"></i>Sair</a>
    </section>
</aside>

    <script>
        const btnMenu = document.getElementById('btn-menu');
        const menu = document.querySelector('.menu_lateral');
        const body = document.body;

        btnMenu.addEventListener('click', () => {
            menu.classList.toggle('ativo');
            body.classList.toggle('menu-aberto');
        });
    </script>