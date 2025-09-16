<?php
$pagina_atual = basename($_SERVER['PHP_SELF']); 

$etapas = [
    ['arquivo' => 'cadastros.php', 'title' => 'Alunos', 'desc' => 'Cadastrar alunos', 'icon' => 'user'],
    ['arquivo' => 'cadastro-responsaveis.php', 'title' => 'Responsável', 'desc' => 'Cadastrar responsável', 'icon' => 'users'],
    ['arquivo' => 'cadastro-estrutura-familiar.php', 'title' => 'Estrutura Familiar', 'desc' => 'Informações familiares', 'icon' => 'home'],
    ['arquivo' => 'cadastro-pessoas-autorizadas.php', 'title' => 'Pessoas Autorizadas', 'desc' => 'Cadastrar pessoas autorizadas', 'icon' => 'id card']
];

// Encontrar o índice da etapa atual
$indice_atual = array_search($pagina_atual, array_column($etapas, 'arquivo'));
?>

<div class="ui stackable steps full-width">
    <?php foreach ($etapas as $indice => $etapa): ?>
        <a class="step 
                <?= $indice < $indice_atual ? 'completed' : '' ?> 
                <?= $indice === $indice_atual ? 'active' : '' ?>" 
           href="<?= $etapa['arquivo'] ?>">
            <i class="<?= $etapa['icon'] ?> icon"></i>
            <div class="content">
                <div class="title"><?= $etapa['title'] ?></div>
                <div class="description"><?= $etapa['desc'] ?></div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
