<?php

require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$ra_aluno = $_GET['idAluno'] ?? '';

$dadosCompletos = $matricula->buscarDadosCompletosAluno($ra_aluno);

if (!$dadosCompletos) {
    die("Erro: Aluno não encontrado ou ID inválido.");
}

$aluno = $dadosCompletos['aluno'];
$endereco = $dadosCompletos['endereco'];
$resp1 = $dadosCompletos['responsavel_1'];
$resp2 = $dadosCompletos['responsavel_2'];
$estrutura = $dadosCompletos['estrutura_familiar'];
$pessoa_autorizada1 = $dadosCompletos['pessoa_autorizada_1'];
$pessoa_autorizada2 = $dadosCompletos['pessoa_autorizada_2'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/3.0.3/jspdf.umd.min.js"></script>
</head>

<body>
    <button onclick="gerarPdf()">Gerar PDF</button>
    <button onclick="visualizarPdf()">Pré-visualizar PDF</button>

    <script>
        // Passando os dados do PHP para o JS
        const aluno = <?php echo json_encode($aluno); ?>;
        const endereco = <?php echo json_encode($endereco); ?>;
        const resp1 = <?php echo json_encode($resp1); ?>;
        const resp2 = <?php echo json_encode($resp2); ?>;
        const estrutura = <?php echo json_encode($estrutura); ?>;
        const pessoa_autorizada1 = <?php echo json_encode($pessoa_autorizada1); ?>;
        const pessoa_autorizada2 = <?php echo json_encode($pessoa_autorizada2); ?>;

        const {
            jsPDF
        } = window.jspdf;

        function gerarPdf() {
            const doc = criarPdf();
            doc.save(`Ficha_${aluno.nome}.pdf`);
        }

        function visualizarPdf() {
            const doc = criarPdf();

            const pdfBlob = doc.output("blob");

            const pdfUrl = URL.createObjectURL(pdfBlob);

            window.open(pdfUrl, "_blank");
        }

        function criarPdf() {
            const doc = new jsPDF();
            const pageWidth = doc.internal.pageSize.getWidth();
            let posY = 20;

            // Título
            doc.setFont("helvetica", "bold");
            doc.setFontSize(16);
            doc.text("MATRICULA 2025", pageWidth / 2, posY, {
                align: "center"
            });

            // Espaçamento vertical
            posY += 15; // move 15 mm para baixo

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text(`1 - IDENTIFICAÇÃO DA CRIANÇA RA: ${aluno.ra_aluno}`, 10, posY); // alinha à esquerda
            posY += 10;

            doc.setFont("helvetica", "normal");
            doc.setFontSize(14);
            doc.text(`Nome: ${aluno.nome}`, 10, posY);
            posY += 10;

            function formatarDataBR(data) {
                if (!data) return '';
                const [ano, mes, dia] = data.split('-');
                return `${dia}/${mes}/${ano}`;
            }

            doc.setFontSize(14);
            doc.text(`Data de Nascimento: ${formatarDataBR(aluno.data_nascimento)}`, 10, posY);
            doc.text(`Cor/Raça: ${aluno.etnia}`, 120, posY);
            posY += 10;

            doc.text(`Endereço: ${endereco.endereco}`, 10, posY);
            doc.text(`Numero: ${endereco.numero}`, 120, posY);
            posY += 10;

            doc.text(`Bairro: ${endereco.bairro}`, 10, posY);
            doc.text(`Cidade: ${endereco.cidade}`, 120, posY);
            posY += 10;

            const febreAutorizada = aluno.autorizacao_febre == 1 ? "Sim (X)  Não ()" : "Sim ()  Não (X)";
            doc.text(`Em caso de febre autoriza medicar a criança: ${febreAutorizada}`, 10, posY);
            posY += 10;

            const nomeRemedio = aluno.autorizacao_febre == 1 ? aluno.remedio : "Nenhum";
            const qtdGotas = aluno.autorizacao_febre == 1 ? aluno.gotas : "0";

            doc.text(`Qual remédio: ${nomeRemedio}`, 10, posY);
            doc.text(`Quantas gotas: ${qtdGotas}`, 120, posY);
            posY += 10;

            doc.setFont("helvetica", "bold");
            doc.setFontSize(12)
            doc.text('OBS: LEMBRANDO QUE NÃO ADMINISTRAMOS NENHUM OUTRO TIPO DE \nREMÉDIO QUE NÃO SEJA O DE FEBRE', 10, posY)
            posY += 10

            posY += 10;
            doc.setFont("helvetica", "normal");
            doc.setFontSize(14);

            const imagemAutorizada = aluno.autorizacao_imagem == 1 ?
                "Autorizo a divulgação de imagem do meu filho (a): (X)Sim  ()Não" :
                "Autorizo a divulgação de imagem do meu filho (a): ()Sim  (X)Não";

            const textoImagem = imagemAutorizada + " para o uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site";
            const textoQuebrado = doc.splitTextToSize(textoImagem, 180);

            doc.text(textoQuebrado, 10, posY);
            posY += textoQuebrado.length * 6;

            posY += 10;
            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text("2 - IDENTIFICAÇÃO DOS RESPONSAVEIS:", 10, posY);
            posY += 10;

            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);

            const tipoResponvel = resp1.tipo_responsavel
            doc.text(`${tipoResponvel}: ${resp1.nome}`, 10, posY);
            posY += 8;

            doc.text(`Data de nascimento: ${formatarDataBR(resp1.data_nascimento || '')}`, 10, posY);
            doc.text(`Estado civil: ${resp1.estado_civil}`, 110, posY);
            posY += 8;

            doc.text(`Escolaridade: ${resp1.escolaridade}`, 10, posY);
            doc.text(`Telefone: ${resp1.celular}`, 110, posY);
            posY += 8;

            doc.text(`Email: ${resp1.email}`, 10, posY);
            posY += 8;

            const nomeEmpresa = resp1.nome_empresa ? resp1.nome_empresa : 'Não informado';
            doc.text(`Nome da empresa: ${nomeEmpresa}`, 10, posY);
            doc.text("Profissão:", 130, posY);
            posY += 8;

            const telefoneTrabalho = resp1.telefone_trabalho ? resp1.telefone_trabalho : 'Não informado';
            doc.text(`Telefone do trabalho: ${telefoneTrabalho}`, 10, posY);
            
            const horario = resp1.horario_trabalho ? resp1.horario_trabalho : 'Não informado'
            doc.text(`Horário: ${horario}`, 130, posY);
            posY += 8;

            const salario = resp1.salario ? resp1.salario : 'Não informado'
            doc.text(`Salário:${salario}`, 10, posY);
            doc.text("Possui outra renda? () sim () não  valor:", 90, posY);
            posY += 12;

            // --- PAI ---
            doc.text("Pai:", 10, posY);
            posY += 8;

            doc.text("Data de nascimento:", 10, posY);
            doc.text("Estado civil:", 110, posY);
            posY += 8;

            doc.text("Escolaridade:", 10, posY);
            doc.text("Telefone:", 110, posY);
            posY += 8;

            doc.text("Email:", 10, posY);
            posY += 8;

            doc.text("Nome da empresa:", 10, posY);
            doc.text("Profissão:", 130, posY);
            posY += 8;

            doc.text("Telefone do trabalho:", 10, posY);
            doc.text("Horário:", 130, posY);
            posY += 8;

            doc.text("Salário:", 10, posY);
            doc.text("Possui outra renda? () sim () não  valor:", 90, posY);
            posY += 12;

            return doc;


        }
    </script>
</body>

</html>