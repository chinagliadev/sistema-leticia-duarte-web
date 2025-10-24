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
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <script src="./js/semantic_ui.js"></script>
    <script src="./js/validacao-formulario.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">


</head>

<body>
    <section class="corpo_pagina">
        <?php include './template/menuLateral.php' ?>

        <main class="conteudo_cadastrados">

            <section class="sessao_cadastro">
                <section class="cabecalho_cadastrados ui segment blue">
                    <h2>Gerar PDF</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                        alt="logo da leticia duarte na tela de cadastros de alunos">
                </section>

                <section class="ui segment blue">
                    <div class="ui two column stackable grid">
                        <div class="eight wide column">
                            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%;">
                                <h2>Gerar um PDF do aluno(a) <?= $aluno['nome'] ?></h2>
                                <p style="color: #1d1d1dff;">Crie rapidamente um arquivo PDF com os dados do aluno para salvar, compartilhar ou imprimir</p>
                                <div class="ui vertical buttons">
                                    <button class="ui red large icon button" onclick="gerarPdf()">
                                        <i class="file pdf icon"></i> Gerar PDF
                                    </button>
                                    <div class="ui divider"></div>
                                    <button class="ui primary large icon button" onclick="visualizarPdf()">
                                        <i class="eye icon"></i> Pré-visualizar PDF
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="eight wide column">
                            <img width="600px" src="./img/pdf_img/gerar_pdf.png" alt="Nenhum cadastrado" class="ui centered image">
                        </div>
                    </div>
                </section>

            </section>
        </main>
    </section>


    <script>
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

            const imgData = "data:image/png;base64,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"

            const imgWidth = 50;
            const imgHeight = 17;

            const x = (pageWidth - imgWidth) / 2;

            doc.addImage(imgData, 'PNG', x, 20, imgWidth, imgHeight);

            posY += 27;
            doc.setFont("helvetica", "bold");
            doc.setFontSize(16);
            doc.text("MATRICULA 2025", pageWidth / 2, posY, {
                align: "center"
            });

            posY += 15;

            doc.setFillColor(230, 230, 230);
            doc.rect(8, posY - 6, 190, 7, 'F');

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text(`1 - IDENTIFICAÇÃO DA CRIANÇA`, 10, posY);
            doc.text(`RA: ${aluno.ra_aluno}`, 155, posY);
            posY += 10;

            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);
            doc.text(`Nome: ${aluno.nome}`, 10, posY);
            doc.text(`CPF: ${aluno.cpf}`, 130, posY);
            posY += 8;

            function formatarDataBR(data) {
                if (!data) return '';
                const [ano, mes, dia] = data.split('-');
                return `${dia}/${mes}/${ano}`;
            }

            doc.text(`RG: ${aluno.rg}`, 10, posY);
            posY += 8;

            doc.text(`Data de Nascimento: ${formatarDataBR(aluno.data_nascimento)}`, 10, posY);
            doc.text(`Cor/Raça: ${aluno.etnia}`, 130, posY);
            posY += 8;

            doc.text(`Endereço: ${endereco.endereco}`, 10, posY);
            doc.text(`Numero: ${endereco.numero}`, 130, posY);
            posY += 8;

            doc.text(`Bairro: ${endereco.bairro}`, 10, posY);
            doc.text(`Cidade: ${endereco.cidade}`, 130, posY);
            posY += 8;

            const febreAutorizada = aluno.autorizacao_febre == 1 ? "Sim (X)  Não ()" : "Sim ()  Não (X)";
            doc.text(`Em caso de febre autoriza medicar a criança:`, 10, posY);
            doc.text(`${febreAutorizada}`, 130, posY);

            posY += 8;

            const nomeRemedio = aluno.autorizacao_febre == 1 ? aluno.remedio : "Nenhum";
            const qtdGotas = aluno.autorizacao_febre == 1 ? aluno.gotas : "0";

            doc.text(`Qual remédio: ${nomeRemedio}`, 10, posY);
            doc.text(`Quantas gotas: ${qtdGotas}`, 130, posY);
            posY += 8;

            doc.setFont("helvetica", "bold");
            doc.setFontSize(12)
            doc.text('OBS: LEMBRANDO QUE NÃO ADMINISTRAMOS NENHUM OUTRO TIPO DE \nREMÉDIO QUE NÃO SEJA O DE FEBRE', 10, posY)
            posY += 8

            posY += 8;
            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);

            const imagemAutorizada = aluno.autorizacao_imagem == 1 ?
                "Autorizo a divulgação de imagem do meu filho (a): (X)Sim  ()Não" :
                "Autorizo a divulgação de imagem do meu filho (a): ()Sim  (X)Não";

            const textoImagem = imagemAutorizada + " para o uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site";
            const textoQuebrado = doc.splitTextToSize(textoImagem, 180);

            doc.text(textoQuebrado, 10, posY);
            posY += textoQuebrado.length * 6;

            posY += 8;

            doc.setFillColor(230, 230, 230);
            doc.rect(8, posY - 6, 190, 7, 'F');

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text("2 - IDENTIFICAÇÃO DOS RESPONSAVEIS:", 10, posY);
            posY += 8;

            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);

            const tipoResponvel = resp1.tipo_responsavel
            doc.text(`${tipoResponvel}: ${resp1.nome}`, 10, posY);
            posY += 8;

            doc.text(`Data de nascimento: ${formatarDataBR(resp1.data_nascimento || '')}`, 10, posY);
            doc.text(`Estado civil: ${resp1.estado_civil}`, 130, posY);
            posY += 8;

            doc.text(`Escolaridade: ${resp1.escolaridade}`, 10, posY);
            doc.text(`Telefone: ${resp1.celular}`, 130, posY);
            posY += 8;

            doc.text(`Email: ${resp1.email}`, 10, posY);
            posY += 8;

            const nomeEmpresa = resp1.nome_empresa ? resp1.nome_empresa : 'Não informado';
            doc.text(`Nome da empresa: ${nomeEmpresa}`, 10, posY);

            doc.text(`Profissão:${resp1.profissao}`, 130, posY);
            posY += 8;

            const telefoneTrabalho = resp1.telefone_trabalho ? resp1.telefone_trabalho : 'Não informado';
            doc.text(`Telefone do trabalho: ${telefoneTrabalho}`, 10, posY);

            const horario = resp1.horario_trabalho ? resp1.horario_trabalho : 'Não informado'
            doc.text(`Horário: ${horario}`, 130, posY);
            posY += 8;

            const salario = resp1.salario ? resp1.salario : 'Não informado';
            let textoSalario;

            if (salario === 'Não informado') {
                textoSalario = `Salário: ${salario}`;
            } else {
                textoSalario = `Salário: R$ ${salario}`;
            }

            doc.text(textoSalario, 10, posY);

            const possuiOutraRenda = resp1.renda_extra == 1 ? "(X) Sim" : "() não";
            const valorRendaExtra = resp1.valor_renda_extra ? resp1.valor_renda_extra : '0,00';

            doc.text(`Possui outra renda? ${possuiOutraRenda}  Valor: R$ ${valorRendaExtra}`, 90, posY);

            posY += 12;

            if (resp2 !== null) {
                doc.setFont("helvetica", "normal");
                doc.setFontSize(12);

                const tipoResponvel = resp2.tipo_responsavel;
                doc.text(`${tipoResponvel}: ${resp2.nome}`, 10, posY);
                posY += 8;

                doc.text(`Data de nascimento: ${formatarDataBR(resp2.data_nascimento || '')}`, 10, posY);
                doc.text(`Estado civil: ${resp2.estado_civil}`, 130, posY);
                posY += 8;

                doc.text(`Escolaridade: ${resp2.escolaridade}`, 10, posY);
                doc.text(`Telefone: ${resp2.celular}`, 130, posY);
                posY += 8;

                doc.text(`Email: ${resp2.email}`, 10, posY);
                posY += 8;

                const nomeEmpresa = resp2.nome_empresa ? resp2.nome_empresa : 'Não informado';
                doc.text(`Nome da empresa: ${nomeEmpresa}`, 10, posY);

                doc.text(`Profissão:${resp2.profissao}`, 130, posY);
                posY += 8;

                const telefoneTrabalho = resp2.telefone_trabalho ? resp2.telefone_trabalho : 'Não informado';
                doc.text(`Telefone do trabalho: ${telefoneTrabalho}`, 10, posY);

                const horario = resp2.horario_trabalho ? resp2.horario_trabalho : 'Não informado';
                doc.text(`Horário: ${horario}`, 130, posY);
                posY += 8;

                const salario = resp2.salario ? resp2.salario : 'Não informado';
                let texto;

                if (salario === 'Não informado') {
                    texto = `Salário: ${salario}`;
                } else {
                    texto = `Salário: R$${salario}`;
                }

                doc.text(texto, 10, posY);


                const possuiOutraRenda = resp2.renda_extra == 1 ? "(X) Sim" : "() Não";
                const valorRendaExtra = resp2.valor_renda_extra ? resp2.valor_renda_extra : '0,00';
                doc.text(`Possui outra renda? ${possuiOutraRenda}  Valor: R$ ${valorRendaExtra}`, 90, posY);

                posY += 12;
            } else {

            }

            doc.addPage();
            posY = 20;

            doc.setFillColor(230, 230, 230);
            doc.rect(8, posY - 6, 190, 7, 'F');

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text("3 - ESTRUTURA FAMILIAR:", 10, posY);


            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);
            posY += 8;
            const numeroFilhos = estrutura.numero_filhos
            doc.text(`N de filhos: ${numeroFilhos}`, 10, posY);

            const paisVivemJuntosTexto = estrutura.pais_vivem_juntos == 1 ?
                'Sim' :
                'Não';

            doc.text(`Pais vivem juntos: ${paisVivemJuntosTexto}`, 130, posY);

            // posY += 8;
            // doc.text(`Tipo de moradia: `, 10, posY);
            // doc.text(`Valor do aluguel: `, 130, posY);
            posY += 8;


            const transporte_carro = estrutura.transporte_carro == 1 ? '(X) Carro' : '( ) Carro';
            const transporte_van = estrutura.transporte_van == 1 ? '(X) Van' : '( ) Van';
            const transporte_a_pe = estrutura.transporte_a_pe == 1 ? '(X) A pé' : '( ) A pé';
            const transporte_outros_desc = estrutura.transporte_outros_desc == 1 ? `(X) Outros:` : '( ) Outros';

            doc.text(
                `Transporte para a escola: ${transporte_carro}   ${transporte_van}   ${transporte_a_pe} ${transporte_outros_desc}`,
                10,
                posY
            );
            posY += 8;

            const recebeBolsa = estrutura.recebe_bolsa_familia ? 'Sim' : 'Não'
            doc.text(`Recebe bolsa familia: ${recebeBolsa}`, 10, posY)

            if (estrutura.recebe_bolsa_familia) {
                doc.text(`Valor:R$ ${estrutura.valor}`, 130, posY)
            }
            posY += 8;

            const tipoMoradia = estrutura.tipo_moradia;
            doc.text(`Tipo Moradia: ${tipoMoradia}`, 10, posY);

            if (tipoMoradia === 'alugada') {
                doc.text(`Valor do Aluguel: R$ ${estrutura.valor_aluguel}`, 130, posY);
            }

            posY += 8;
            doc.setFillColor(230, 230, 230);
            doc.rect(8, posY - 6, 190, 7, 'F');

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text("3.1 - INFORMAÇÕES IMPORTANTES SOBRE A CRIANÇA:", 10, posY);
            posY += 8;

            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);
            const possuiConvenio = estrutura.qual_convenio ?
                'Sim' :
                'Não';

            doc.text(`Possui convênio: ${possuiConvenio}`, 10, posY);

            if (estrutura.qual_convenio) {
                doc.text(`Qual convênio: ${estrutura.qual_convenio}`, 130, posY);
            }
            posY += 8;

            const portadorNecessidade = estrutura.portador_necessidade_especial ? 'Sim' : 'Não'
            doc.text(`Portador de alguma necessidade especial?: ${portadorNecessidade}`, 10, posY);

            if (estrutura.qual_necessidade_especial) {
                const qualNecessidade = estrutura.qual_necessidade_especial
                doc.text(`Qual necessidade especial?: ${qualNecessidade}`, 130, posY);
            }

            posY += 8;
            const alergia = estrutura.possui_alergia ? 'Sim' : 'Não'
            doc.text(`Possui alergia: ${alergia}`, 10, posY);

            if (estrutura.especifique_alergia) {
                doc.text(`Especifique: ${estrutura.especifique_alergia}`, 130, posY);
            }

            posY += 8;

            const fezCirurgia = String(estrutura.ja_fez_cirurgia);

            const ja_fez_cirurgia = (fezCirurgia === '1' || fezCirurgia === 'Sim') ? 'Sim' : 'Não';

            doc.text(`Já fez cirurgia: ${ja_fez_cirurgia}`, 10, posY);

            if (ja_fez_cirurgia === 'Sim') {
                const qualCirurgia = estrutura.qual_cirurgia || 'Não informado';
                doc.text(`Qual: ${qualCirurgia}`, 130, posY);
            }

            posY += 8;


            const tomou_vacina = estrutura.vacina_catapora_varicela ? 'Sim' : 'Não'
            doc.text(`Tomou vacina contra catapora ou varicela: ${tomou_vacina}`, 10, posY)
            posY += 8;

            const doenca_anemia = estrutura.doenca_anemia == 1 ? '(x) Anemia' : '() Anemia';
            const doenca_bronquite = estrutura.doenca_bronquite == 1 ? '(x) Bronquite' : '() Bronquite';
            const doenca_catapora = estrutura.doenca_catapora == 1 ? '(x) Catapora' : '() Catapora';
            const doenca_covid = estrutura.doenca_covid == 1 ? '(x) Covid' : '() Covid';
            const doenca_cardiaca = estrutura.doenca_cardiaca == 1 ? '(x) Doença Cardíaca' : '() Doença Cardíaca';
            const doenca_meningite = estrutura.doenca_meningite == 1 ? '(x) Meningite' : '() Meningite';
            const doenca_pneumonia = estrutura.doenca_pneumonia == 1 ? '(x) Pneumonia' : '() Pneumonia';
            const doenca_convulsao = estrutura.doenca_convulsao == 1 ? '(x) Convulsão' : '() Convulsão';
            const doenca_diabete = estrutura.doenca_diabete == 1 ? '(x) Diabetes' : '() Diabetes';
            const doenca_refluxo = estrutura.doenca_refluxo == 1 ? '(x) Refluxo' : '() Refluxo';
            const outras_doencas = estrutura.outras_doencas ? estrutura.outras_doencas : 'Nenhuma';

            const textoDoencas =
                `Doença que a criança já teve: ${doenca_anemia}, ${doenca_bronquite}, ${doenca_catapora}, ${doenca_covid}, ${doenca_cardiaca}, ${doenca_meningite}, ${doenca_pneumonia}, ${doenca_convulsao}, ${doenca_diabete}, ${doenca_refluxo}, Outras: ${outras_doencas}`;

            const linhasDoencas = doc.splitTextToSize(textoDoencas, 180);
            doc.text(linhasDoencas, 10, posY);
            posY += linhasDoencas.length * 6 + 7;

            doc.setFillColor(230, 230, 230);
            doc.rect(8, posY - 6, 190, 7, 'F');

            doc.setFont("helvetica", "bold");
            doc.setFontSize(14);
            doc.text("4 - PESSOAS AUTORIZADAS A BUSCAR MEU FILHO(A) NA CRECHE", 10, posY);

            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);

            posY += 8;
            if (pessoa_autorizada1 && pessoa_autorizada1.nome) {
                doc.text(`Nome: ${pessoa_autorizada1.nome} `, 10, posY);
                doc.text(`Parentesco: ${pessoa_autorizada1.parentesco} `, 130, posY);
                posY += 8;

                doc.text(`CPF: ${pessoa_autorizada1.cpf} `, 10, posY);
                doc.text(`Telefone: ${pessoa_autorizada1.celular} `, 130, posY);

            }
            posY += 6;

            if (pessoa_autorizada2 && pessoa_autorizada2.nome) {
                doc.text(`Nome: ${pessoa_autorizada2.nome} `, 10, posY);
                doc.text(`Parentesco: ${pessoa_autorizada2.parentesco} `, 130, posY);
                posY += 8;

                doc.text(`CPF: ${pessoa_autorizada2.cpf} `, 10, posY);
                doc.text(`Telefone: ${pessoa_autorizada2.celular} `, 130, posY);
            }
            posY += 6;

            if (pessoa_autorizada2 && pessoa_autorizada2.nome) {
                doc.text(`Nome: ${pessoa_autorizada2.nome} `, 10, posY);
                doc.text(`Parentesco: ${pessoa_autorizada2.parentesco} `, 130, posY);
                posY += 8;

                doc.text(`CPF: ${pessoa_autorizada2.cpf} `, 10, posY);
                doc.text(`Telefone: ${pessoa_autorizada2.celular} `, 130, posY);
            }
            posY += 6;

            if (pessoa_autorizada2 && pessoa_autorizada2.nome) {
                doc.text(`Nome: ${pessoa_autorizada2.nome} `, 10, posY);
                doc.text(`Parentesco: ${pessoa_autorizada2.parentesco} `, 130, posY);
                posY += 8;

                doc.text(`CPF: ${pessoa_autorizada2.cpf} `, 10, posY);
                doc.text(`Telefone: ${pessoa_autorizada2.celular} `, 130, posY);
            }

            posY += 10;

            doc.text('Horário de entrada: das 7h ás 7:30 saída: das 15:45h as 16:30h sem tolerancia de atrasos.', 10, posY)
            posY += 8
            doc.text('O uso de uniforme é obrigatório na entrada e saida da criança.', 10, posY)
            posY += 8
            doc.text('Todas as faltas deverão ser justificadas ou a criança poderá perder a vaga.', 10, posY)
            posY += 8
            doc.text('Em caso de consulta médica a criança poderá entrar com o atestado médico até as 10h.', 10, posY)
            posY += 8
            doc.text('Declaro ter conhecimento das normas e regras estabelecidas pela instituição e estou ciente em\ncumprilas para evitar o cancelamento da vaga, caso aja derespeito das mesmas .', 10, posY)
            posY += 14
            posY += 8

            doc.text('_________________________________________________', 10, posY)
            posY += 8
            doc.text('ASSINATURA DO RESPONSAVEL', 10, posY)
            posY += 20
            doc.text('_________________________________________________', 10, posY)
            posY += 8
            doc.text('ASSINATURA DO DIRETOR PRESIDENTE', 10, posY)


            return doc;
        }
    </script>
</body>

</html>