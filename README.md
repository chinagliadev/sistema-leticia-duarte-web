#  Sistema Leticia Duarte Web

[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)
[![Banco de Dados](https://img.shields.io/badge/MariaDB-10.4%2B-orange.svg)](https://mariadb.org/)
[![Framework UI](https://img.shields.io/badge/Semantic_UI-v2.4-teal.svg)](https://semantic-ui.com/)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)
[![Licença](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## Objetivo

O Sistema Leticia Duarte Web tem como objetivo **facilitar e otimizar a gestão de cadastros e informações** de alunos ou beneficiários da Fundação Leticia Duarte. A iniciativa busca não apenas agilizar o processo de registro, mas também contribuir para a organização e eficiência das rotinas administrativas internas, oferecendo uma ferramenta de apoio prática e funcional para a equipe da Fundação.

Este projeto foi desenvolvido com foco na aplicação prática para atender às necessidades reais da Fundação.

## Propósito

Contribuir para a **digitalização e aprimoramento da gestão de dados** da Fundação Leticia Duarte, transformando um processo manual em um sistema eficiente que gera impacto positivo na organização e no atendimento aos assistidos.

## Proposta

A proposta do Sistema Leticia Duarte Web é auxiliar o controle e o registro de informações, **substituindo o trabalho totalmente manual** — realizado com **caneta e papel** ou **anotações dispersas** — por uma ferramenta digital ágil e acessível. O sistema permite a **gestão completa dos cadastros**, centralizando os dados e facilitando o acompanhamento.

**Principais Benefícios:**

* **Centralização de Dados:** Todas as informações dos assistidos em um único local seguro.
* **Eficiência Operacional:** Redução do tempo gasto em tarefas de registro e busca manual de informações.
* **Decisão Baseada em Dados:** Geração de relatórios e PDFs para análises e documentação.

---

## Protótipo do Projeto

[![Figma](https://img.shields.io/badge/Design%20no%20Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)](https://www.figma.com/design/KsWK9q3Scs823Fy062JqP7/Sistema-Leticia-Duarte?node-id=0-1&t=l8vc2w67ZYdAwIkK-1)

O protótipo no Figma é o **guia visual completo** que define a **Experiência do Usuário (UX)** e o **Design de Interface (UI)** do sistema. A ideia central do protótipo foi construir uma **interface extremamente fácil, limpa e intuitiva** para o usuário final.

### Objetivo do Design: Facilidade na Transição Digital

* **Usabilidade para Não-Técnicos:** O design foi cuidadosamente elaborado para facilitar a migração dos funcionários, minimizando a curva de aprendizado ao trocar o registro manual pela ferramenta digital.
* **Fluxo Simplificado:** O protótipo mapeia todo o caminho do usuário, desde o Login até a gestão de cadastros, com foco em poucos cliques e clareza na navegação.
* **Design Consistente:** Garante a aplicação de um sistema de cores e tipografia padronizado, utilizando elementos de Bootstrap e Semantic UI, para criar uma identidade visual coesa e confiável.

### Cores e Tipografia (Paleta do Projeto)

A identidade visual do Sistema Leticia Duarte é definida pela seguinte paleta de cores e seleção de fontes, visando clareza e profissionalismo:

**Cores Primárias:**

* **Azul Claro:** `#CAF6FF` 
* **Preto Escuro:** `#0D0D0D` 
* **Branco:** `#FFFFFF` 
* **Azul Principal:** `#00568E` 

**Fontes Utilizadas:**

* **Títulos/Destaques:** `Bungee`
* **Corpo de Texto:** `Baloo 2`

## Estrutura do projeto
Projeto: Sistema-Leticia-Duarte/

```bash
├── 🔧 .env                          # Variáveis de ambiente para conexão com o banco (local)  
├── 📋 env-exemplo                   # Template de exemplo da configuração local  
├── 🚫 .gitignore                    # Arquivos/pastas ignorados pelo Git  
├── 🧾 README.md                     # Documentação do projeto (este arquivo)  
├── 🔌 config.php                    # Configuração da conexão com o banco (lê .env)  
├── 🔐 auth.php                      # Validação de sessão / autenticação  
├── 🏠 index.html                    # Página inicial / apresentação  
├── 🔑 login.php                     # Tela de login  
├── 🧑‍💻 perfil.php                    # Perfil do usuário / administrador  
├── 📝 formulario-cadastro.php       # Formulário para cadastro de aluno  
├── 💾 salvar-cadastro-aluno.php     # Processa e salva novo cadastro de aluno  
├── ✏ editar-aluno.php               # Formulário de edição de aluno  
├── 💾 salvar-edicao-aluno.php       # Processa e salva edição de aluno  
├── 📋 cadastrados.php               # Lista de alunos cadastrados  
├── 🔍 detalhes-aluno.php            # Visualizar dados completos do aluno  
├── ♻ ativar-cadastro-aluno.php      # Ativar cadastro / matrícula  
├── ❌ desativar-cadastro-aluno.php  # Desativar cadastro / matrícula  
├── 🗑 modal-excluir-aluno.php        # Modal para exclusão (em template/modal)  
├── 🖨 gerar-arquivo-pdf.php          # Gera PDF do cadastro  
├── ✉️ enviar-email (PHPMailer)      # Envio de e‑mail via PHPMailer (pasta PHPMailer-master)  
├── 📦 class/                        # Classes PHP (modelo/DAO)  
│   ├── Aluno.php  
│   ├── Endereco.php  
│   ├── EstrturaFamiliar.php  
│   ├── Matricula.php  
│   └── MatriculaPessoaAutorizada.php  
├── 🎨 css/                        # Estilos  
│   ├── login.css  
│   └── sistema.css  
├── 🔤 fonts/                      # Fontes do projeto  
├── 🖼 img/                         # Imagens e ícones  
├── ⚡ js/                         # Scripts JS  
│   ├── validacao-formulario.js  
│   └── semantic_ui.js  
├── 📁 template/                   # Partials / modais / componentes  
│   ├── cadastro_aluno/  
│   │   ├── aluno.php  
│   │   ├── estrutura-familiar.php  
│   │   └── pessoas-autorizadas.php  
│   ├── menuLateral.php  
│   └── modal/ (modais: esquecer senha, excluir, ativar matrícula)  
└── PHPMailer-master/           # Biblioteca PHPMailer (envio de e‑mail)
```
---

## Descrição dos arquivos importantes
- .env — Variáveis sensíveis (DB, SMTP). Não comitar.  
- env-exemplo — Modelo de .env para referências.  
- config.php — Carrega variáveis do .env e fornece conexão PDO.  
- auth.php — Verificação de sessão, proteção de rotas e redirecionamentos.  
- index.html — Página inicial/landing do sistema.  
- login.php / verificarAdmin.php — Fluxo de autenticação do usuário/administrador.  
- perfil.php / - Visualização e atualização de dados do usuário.  
- formulario-cadastro.php — Formulário composto por partes em template/cadastro_aluno.  
- salvar-cadastro-aluno.php — Sanitiza, valida e persiste dados em várias tabelas (aluno, endereço, matrícula, autorizados).  
- editar-aluno.php  — Edição de cadastro com reuso de templates.  
- cadastrados.php — Listagem e filtros; ações: editar, ativar/desativar, gerar PDF, excluir.  
- detalhes-aluno.php — Exibição detalhada (dados do aluno, endereço, estrutura familiar, autorizados).  
- gerar-arquivo-pdf.php — Geração de PDF do cadastro (pode integrar jsPDF).  
- PHPMailer-master/ — Biblioteca para envio de e‑mail (configure credenciais SMTP no .env/arquivo correspondente).

# Classes do Projeto

### Responsavel.php

A classe `Responsavel` atua como o **Modelo de Dados (Data Model)** no sistema, sendo responsável por toda a lógica de persistência e gerenciamento dos dados dos responsáveis pelos alunos ou assistidos da Fundação.

Ela é a ponte entre a aplicação PHP e a tabela `tb_responsaveis` no banco de dados.

## Funcionalidades e Métodos

A classe implementa a conexão com o banco de dados via **PDO** e oferece o método principal para registrar novos responsáveis.

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Estabelece a conexão com o banco de dados. |
| **Detalhes** | Utiliza a classe nativa `PDO` e carrega as credenciais de conexão (`DBNAME`, `HOST`, `USUARIO`, `SENHA`) a partir das **variáveis de ambiente** (`$_ENV`). |
| **Segurança** | Implementa a boa prática de separar credenciais do código principal. |

### `cadastrarResponsavel(...)`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Insere um novo registro de responsável na tabela `tb_responsaveis`. |
| **Parâmetros** | Recebe 15 parâmetros, que mapeiam todos os campos do formulário/tabela (e.g., `$nome`, `$celular`, `$salario`, `$valor_renda_extra`). |
| **Segurança** | Utiliza **Prepared Statements** (`$this->conn->prepare()`) para proteger contra ataques de Injeção SQL. |
| **Retorno** | Retorna o `ID` do último registro inserido (`$this->conn->lastInsertId()`), permitindo que o sistema associe este responsável a outras entidades (como o aluno) imediatamente. |

## Estrutura da Tabela Mapeada

A classe está diretamente mapeada para a tabela: **`tb_responsaveis`**.

**Principais Atributos Mapeados (Campos de Tabela):**

* `tipo_responsavel`
* `nome`
* `data_nascimento`
* `estado_civil`
* `escolaridade`
* `celular`
* `email`
* `nome_empresa`
* `profissao`
* `telefone_trabalho`
* `horario_trabalho`
* `salario`
* `renda_extra`
* `valor_renda_extra`

---

### PessoaAutorizada.php

A classe `PessoaAutorizada` é um **Modelo de Dados (Data Model)** essencial que gerencia o registro de indivíduos autorizados a ter contato ou interagir com o aluno em nome dos responsáveis. Ela atua como a interface de dados para a tabela `tb_pessoas_autorizadas`.

## Funcionalidades e Métodos

Esta classe é focada na persistência de dados e na segurança da conexão com o banco de dados.

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Inicializa a conexão com o banco de dados. |
| **Detalhes** | Utiliza a classe `PDO` (PHP Data Objects) e carrega as credenciais de acesso (`DBNAME`, `HOST`, etc.) a partir das **variáveis de ambiente** (`$_ENV`). |
| **Princípio** | Mantém as informações sensíveis de conexão isoladas do código da aplicação. |

### `cadastrarPessoaAutorizada($nome, $cpf, $celular, $parentesco)`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Insere um novo registro de pessoa autorizada na tabela `tb_pessoas_autorizadas`. |
| **Parâmetros** | Recebe os dados básicos de identificação da pessoa autorizada: `$nome`, `$cpf`, `$celular` e `$parentesco`. |
| **Segurança** | Emprega **Prepared Statements** (`$this->conn->prepare()`) para prevenir vulnerabilidades de Injeção SQL. |
| **Retorno** | Retorna o **ID** do novo registro inserido (`$this->conn->lastInsertId()`), possibilitando a associação imediata com o aluno (tabela de cadastro principal). |

## Estrutura da Tabela Mapeada

A classe está diretamente mapeada para a tabela: **`tb_pessoas_autorizadas`**.

**Principais Atributos Mapeados (Campos de Tabela):**

* `nome`
* `cpf`
* `celular`
* `parentesco`
* `id` (Gerado automaticamente)

---

### Class: Matricula.php

A classe `Matricula` é o **Modelo de Agregação** do sistema. Seu principal papel é gerenciar a tabela `tb_matricula`, que funciona como o elo de ligação central, conectando os IDs do **Aluno**, dos **Responsáveis**, da **Estrutura Familiar** e das **Pessoas Autorizadas**.

Além de registrar a matrícula, esta classe concentra toda a lógica de **Listagem**, **Pesquisa**, **Filtro** e **Status (Ativa/Inativa)** do cadastro completo do aluno.

## 🛠 Constantes e Propriedades

| Constante | Valor | Descrição |
| :--- | :--- | :--- |
| `MATRICULA_ATIVA` | `1` | Indica que o cadastro do aluno está ativo no sistema. |
| `MATRICULA_DESATIVADA` | `0` | Indica que o cadastro do aluno está inativo (saída, desligamento). |

A classe armazena diversas propriedades que são chaves estrangeiras (FKs) da tabela `tb_matricula`:
`$aluno_id`, `$estrutura_familiar_id`, `$funcionario_id`, `$responsavel_1_id`, `$responsavel_2_id`, e 4 IDs para `$pessoa_autorizada_id`.

## Métodos Essenciais (CRUD e Lógica de Negócio)

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Inicializa a conexão com o banco de dados via PDO. |
| **Diferencial** | Inclui um bloco `try-catch` para tratamento de erro de conexão, encerrando a aplicação com uma mensagem clara em caso de falha. |

### `cadastrarMatricula(...)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Registra uma nova matrícula, inserindo todos os IDs relacionados na tabela `tb_matricula`. |
| **Retorno** | Retorna o ID do registro de matrícula recém-criado. |

### `listarMatricula()` e `listarMatriculaDesativada()`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Recuperam todos os cadastros, separando-os por status (`ATIVOS` ou `DESATIVADOS`). |
| **Detalhes** | Executam um `JOIN` entre `tb_matricula`, `tb_alunos` e `tb_responsaveis` para exibir dados de resumo essenciais (`nome_aluno`, `ra_aluno`, `turma`, `nome_responsavel`). |

### `desativarMatricula($idAluno)` e `reativarMatricula($idAluno)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Atualiza o campo `matricula_ativada` na tabela `tb_matricula` para 0 (Desativada) ou 1 (Ativa). |
| **Detalhes** | Utilizam as constantes de classe (`self::MATRICULA_DESATIVADA` / `self::MATRICULA_ATIVA`) para clareza e manutenção. |

### `pesquisarAluno($termoPesquisa)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Permite buscar alunos usando o **RA do Aluno** ou partes do **Nome do Aluno/Responsável**. |
| **Detalhes** | Usa o operador `LIKE` e *Prepared Statements* para pesquisa flexível e segura. |

### `filtrarTurma($turma)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Filtra os alunos ativos por turma específica. Também serve como *Controller* para chamar as funções `listarMatricula()` ou `listarMatriculaDesativada()` com base em parâmetros especiais (`'matriculas-ativadas'`/`'matriculas-desativadas'`). |

### `buscarDadosCompletosAluno($ra_aluno)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | **Método mais complexo** que busca todos os dados relacionados a um aluno específico. |
| **Processo** | 1. Busca o `aluno_id` pelo `ra_aluno`. 2. Busca o registro da `tb_matricula`. 3. Usa uma função auxiliar interna (`$buscarPorId`) para buscar todos os dados relacionados (aluno, endereço, matrícula, dois responsáveis, estrutura familiar, quatro pessoas autorizadas). |
| **Retorno** | Retorna um array associativo contendo todos os dados do aluno em sub-arrays (e.g., `['aluno' => [...], 'responsavel_1' => [...], ...]`). |

---

### Class: EstruturaFamiliar.php

A classe `EstruturaFamiliar` é um **Modelo de Dados (Data Model)** dedicado a gerenciar as informações sociais, de saúde, e do ambiente familiar e domiciliar do aluno. Ela mapeia a tabela `tb_estrutura_familiar` e é crucial para o levantamento socioeconômico e o cuidado com a saúde dos assistidos.

## Funcionalidades e Métodos

Esta classe tem como foco o registro detalhado do contexto de vida do aluno, possuindo um método de inserção com um grande número de parâmetros.

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Inicializa a conexão com o banco de dados via PDO. |
| **Detalhes** | Carrega as credenciais de conexão a partir das variáveis de ambiente (`$_ENV`), seguindo as melhores práticas de segurança. |

### `cadastrarEstruturaFamiliar(...)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Insere um registro completo de Estrutura Familiar na tabela `tb_estrutura_familiar`. |
| **Parâmetros** | Recebe um número extenso de parâmetros (mais de 30), cobrindo detalhes como união dos pais, número de filhos, condição de moradia, transporte, e histórico detalhado de doenças/condições de saúde. |
| **Estrutura** | A query SQL e a execução utilizam **Prepared Statements** para mapear cada parâmetro de forma segura. |
| **Retorno** | Retorna o ID do registro recém-inserido (`$this->conn->lastInsertId()`), que será usado como chave estrangeira na tabela `tb_matricula`. |

## Tabela Mapeada e Tipos de Dados

**Grupos de Informação Gerenciados:**

| Grupo | Exemplos de Campos Mapeados |
| :--- | :--- |
| **Estrutura Familiar** | `pais_vivem_juntos`, `numero_filhos`. |
| **Condição Social/Renda**| `recebe_bolsa_familia`, `valor` (Bolsa Família), `tipo_moradia`, `valor_aluguel`. |
| **Saúde Básica** | `possui_alergia`, `especifique_alergia`, `possui_convenio`, `qual_convenio`, `problemas_visao`, `ja_fez_cirurgia`. |
| **Necessidades Especiais**| `portador_necessidade_especial`, `qual_necessidade_especial`. |
| **Histórico de Doenças**| Múltiplos campos booleanos (flags) para doenças como `doenca_anemia`, `doenca_covid`, `doenca_meningite`, etc., além de um campo para outras doenças (`outras_doencas`). |
| **Transporte** | Flags para tipo de transporte (`transporte_carro`, `transporte_van`, `transporte_pé`, `outro`
 ---

 ###  Class: Endereco.php

A classe `Endereco` é um **Modelo de Dados (Data Model)** simples e específico, responsável por gerenciar e persistir as informações de endereço no sistema. Ela mapeia a tabela `endereco` e é utilizada para fornecer dados de localização tanto para os alunos quanto para seus responsáveis.

## Funcionalidades e Métodos

A classe é focada na inserção de novos registros de endereço no banco de dados.

### Propriedades

A classe possui atributos públicos que mapeiam diretamente os campos da tabela: `$cep`, `$endereco`, `$numero`, `$bairro`, `$cidade`, e `$complemento`.

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Inicializa a conexão com o banco de dados via PDO. |
| **Detalhes** | As credenciais de conexão são carregadas de forma segura a partir das variáveis de ambiente (`$_ENV`). |

### `cadastrarEndereco($cep, $endereco, $numero, $bairro, $cidade, $complemento = 'Sem complemento')`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Insere um novo registro de endereço na tabela `endereco`. |
| **Parâmetros** | Recebe todos os componentes de um endereço. O parâmetro `$complemento` é opcional, possuindo o valor padrão 'Sem complemento'. |
| **Segurança** | Utiliza **Prepared Statements** para garantir a segurança da inserção no banco de dados. |
| **Retorno** | Retorna o ID do registro de endereço recém-criado (`$this->conn->lastInsertId()`), o qual será usado como chave estrangeira (`endereco_id`) na tabela do aluno ou responsável. |

## Estrutura da Tabela Mapeada

A classe está diretamente mapeada para a tabela: **`endereco`**.

**Principais Atributos Mapeados (Campos de Tabela):**

* `cep`
* `endereco`
* `numero`
* `bairro`
* `cidade`
* `complemento`
* `id_endereco` (Chave Primária, implícita no `lastInsertId()`)

---
 ###  Class: Aluno.php

A classe `Aluno` (ou `Assistido`) é o **Modelo de Dados (Data Model)** fundamental do sistema. Ela é responsável por gerenciar as informações de identificação, saúde básica, e afiliação do aluno na Fundação, mapeando diretamente a tabela `tb_alunos`.

## 🛠 Funcionalidades e Métodos

A classe concentra a lógica de registro da entidade principal do sistema.

### Propriedades

A classe possui atributos públicos que representam os campos da tabela `tb_alunos`, incluindo chaves estrangeiras:

* **Identificação:** `$nome`, `$cpf`, `$raAluno`, `$data_nascimento`, `$etnia`, `$turma`.
* **Saúde e Permissões:** `$autorizacao_febre`, `$remedio`, `$gotas`, `$permissao_foto`.
* **Chaves Estrangeiras (FK):** `$endereco_id` (ID do endereço registrado na classe `Endereco`), `$funcionario_id` (ID do funcionário que realizou o cadastro).

### `__construct()`

| Tipo | Descrição |
| :--- | :--- |
| **Ação** | Inicializa a conexão com o banco de dados via PDO. |
| **Detalhes** | Garante uma conexão segura, carregando as credenciais a partir das variáveis de ambiente (`$_ENV`). |

### `cadastrarAluno(...)`

| Tipo | Ação |
| :--- | :--- |
| **Função** | Insere um novo registro de aluno na tabela `tb_alunos`. |
| **Parâmetros** | Recebe todos os dados de identificação, saúde, e as chaves estrangeiras (`$endereco_id`, `$funcionario_id`). O campo `$rg` é opcional (`=null`). |
| **Fluxo** | Este método é tipicamente chamado após a inserção do Endereço. O ID retornado é, em seguida, utilizado no método `cadastrarMatricula()` da classe `Matricula`. |
| **Segurança** | Utiliza **Prepared Statements** para proteger contra Injeção SQL. |
| **Retorno** | Retorna o ID do registro de aluno recém-criado (`$this->conn->lastInsertId()`), crucial para a próxima etapa da matrícula. |

--- 
# Documentação semantic_ui.js
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)
![Semantic UI](https://img.shields.io/badge/Semantic%20UI-35BDB2?style=for-the-badge&logo=semantic-ui-react&logoColor=white)

## 📝 Visão Geral
Script responsável pela interatividade da interface do sistema, gerenciando modais, máscaras de input e calendários usando jQuery + Semantic UI.

## 🔧 Funcionalidades Principais

### 1. Formatação de Data
```javascript
const formatToDbDate = (date) => {
    // Converte Date para formato Y-m-d do MySQL
    return `${ano}-${mes}-${dia}`;
}
```

### 2. Modais
- **Modal de Edição**
```javascript
$('#modal-editar').modal({
    closable: true,
    onApprove: () => $('#form-editar-aluno').submit()
});
```

- **Modal de Ativação**
```javascript
$(".btn-ativar-aluno").on("click", function() {
    // Preenche e exibe modal de ativação
});
```

- **Modal de Exclusão** 
```javascript
$(".btn-deletar-aluno").on("click", function() {
    // Preenche e exibe modal de exclusão
});
```

### 3. Máscaras de Input (jQuery Mask)
```javascript
// CEP: 00000-000
$('#txtCep').mask('00000-000');

// Telefone: (00) 00000-0000
$('#txtTelefone_1').mask('(00) 00000-0000');

// CPF: 000.000.000-00
$('#txtCpfAluno').mask('000.000.000-00');

// RG: 00.000.000-0 
$('#txtRgAluno').mask('00.000.000-0');

// Valores monetários: R$ 000.000,00
$('#txtValorAluguel').mask('R$ 000.000.000.000.000,00', {
    reverse: true,
    selectOnFocus: true
});
```

### 4. Calendários
Configuração de calendários Semantic UI com:
- Tradução PT-BR
- Limite máximo: data atual
- Formatação DD/MM/YYYY
- Validações específicas

```javascript
const settingsPtBr = {
    months: ['Janeiro', 'Fevereiro',...],
    days: ['Dom', 'Seg',...],
    dateFormat: 'dd/mm/yyyy'
};

$('#dataNascimentoCalendar').calendar({
    type: 'date',
    maxDate: new Date(),
    text: settingsPtBr,
    startMode: 'day'
});
```

##  Dependências
- jQuery 
- jQuery Mask Plugin
- Semantic UI
- Semantic UI Calendar

##  Uso
1. Inclua as dependências
2. Inclua este script
3. Os comportamentos são aplicados automaticamente aos elementos com as classes/IDs correspondentes

##  Observações
- Executado após DOM ready
- Máscaras aplicadas via seletores jQuery
- Modais seguem padrão Semantic UI
- Calendários configurados para PT-BR

# Documentação validacao-formulario.js 
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

##  Visão Geral
Script responsável pela validação dos formulários do sistema, garantindo que os dados inseridos estejam corretos antes do envio ao servidor.

##  Funções Principais

### Utilidades
```javascript
// Exibe mensagem de erro
function mensagemErroCampos(divMensagemErro, divDoCampo, spanTextoErro, mensagem)

// Remove mensagem de erro
function limparErro(divMensagemErro, divDoCampo, spanTextoErro)
```

### Validações do Aluno
- `validarCampoNomeAluno()` - Nome do aluno
- `validarRa()` - RA do aluno 
- `validarCpfAluno()` - CPF do aluno
- `validarDataNascimento()` - Data de nascimento
- `validarRaca()` - Raça/cor
- `validarTurma()` - Turma
- `validarRemedio()` - Medicação
- `validarCampoGotas()` - Dosagem de medicação
- `validarNecessidadeEspecial()` - Necessidades especiais
- `validarAlergia()` - Alergias
- `validarCirurgia()` - Cirurgias realizadas

### Validações de Endereço
- `validarEndereco()` - Logradouro
- `validarNumero()` - Número
- `validarBairro()` - Bairro
- `validarCidade()` - Cidade
- `validarCep()` - CEP com integração ViaCEP
- `buscarCep(cep)` - Busca endereço via CEP

### Validações dos Responsáveis
#### Responsável 1
- `validarTipoResponsavel1()` - Tipo (mãe, pai, etc)
- `validarNomeResponsavel1()` - Nome completo
- `validarDataNascimentoResponsavel1()` - Data de nascimento
- `validarEstadoCivilResponsavel1()` - Estado civil
- `validarEscolaridade()` - Escolaridade
- `validarTelefoneResponsavel1()` - Telefone
- `validarEmailResponsavel1()` - Email
- `validarRendaExtra()` - Renda extra

#### Responsável 2
- `validarTipoResponsavel2()`
- `validarNomeResponsavel2()`
- `validarDataNascimentoResponsavel2()`
- `validarEstadoCivilResponsavel2()`
- `validarEscolaridade2()`
- `validarTelefoneResponsavel2()`
- `validarEmailResponsavel2()`
- `validarRendaExtraResponsavel2()`

### Validações de Pessoas Autorizadas
Para cada pessoa autorizada (1-4):
- `validarNomeAutorizada[N]()` - Nome
- `validarCpfAutorizada[N]()` - CPF 
- `validarTelefoneAutorizada[N]()` - Telefone
- `validarParentesco[N]()` - Parentesco

### Validações da Estrutura Familiar
- `validarBolsaFamilia()` - Recebimento de bolsa família
- `validarConvenioMedico()` - Convênio médico
- `validarCampoAluguel()` - Valor do aluguel
- `ativarCampoAluguel()` - Habilita campo de aluguel

### Funções de Controle
- `adicionarResponsavel()` - Adiciona campos do responsável 2
- `removerResponsavel()` - Remove campos do responsável 2
- `validarPesquisar()` - Validação do campo de pesquisa

### Validação Completa
```javascript
async function validarFormularioCompleto() {
    // Valida todas as seções antes do envio
    const alunoValido = await validarAluno();
    const responsavel1Valido = validarResponsavel1();
    const responsavel2Valido = validarResponsavel2();
    const estruturaFamiliarValida = validarEstruturaFamiliar();
    const pessoaAutorizada1Valida = validarPessoaAutorizada1();
    const pessoaAutorizada2Valida = validarPessoaAutorizada2();

    return alunoValido && 
           responsavel1Valido && 
           responsavel2Valido && 
           estruturaFamiliarValida &&
           pessoaAutorizada1Valida && 
           pessoaAutorizada2Valida;
}
```
--- 

# salvar-cadastro-aluno.php
[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)


## Descrição
Arquivo PHP responsável por processar e salvar os dados do formulário de cadastro de aluno no banco de dados. Integra com múltiplas tabelas e realiza validações server-side.

## Principais Funcionalidades

### Validações Server-side
- Verifica campos obrigatórios
- Valida formatos (CPF, email, datas)
- Checa duplicidade de RA/CPF
- Sanitiza inputs

### Processamento de Dados
1. Dados do Aluno
```php
// Insere dados básicos do aluno
$aluno = new Aluno();
$idAluno = $aluno->cadastrarAluno($nome, $ra, $cpf, ...);
```

2. Endereço
```php
// Cadastra endereço vinculado ao aluno
$endereco = new Endereco();
$endereco->cadastrarEndereco($idAluno, $logradouro, $numero, ...);
```

3. Estrutura Familiar
```php
// Registra dados da estrutura familiar
$estrutura = new EstruturaFamiliar();
$estrutura->cadastrarEstrutura($idAluno, $bolsaFamilia, ...);
```

4. Responsáveis
```php
// Cadastra responsável(is)
$responsavel = new Responsavel();
$responsavel->cadastrarResponsavel($idAluno, $nome, $tipo, ...);
```

5. Pessoas Autorizadas
```php
// Registra pessoas autorizadas
$autorizada = new MatriculaPessoaAutorizada();
$autorizada->cadastrarAutorizada($idAluno, $nome, $cpf, ...);
```

## Outputs
- Redirecionamento em caso de sucesso
- Mensagens de erro/sucesso via sessão
- HTTP status codes apropriados

## Banco de Dados
- Transação única para todas as inserções

## Dependências
- config.php
- class/Aluno.php
- class/Endereco.php
- class/EstruturaFamiliar.php
- class/Responsavel.php
- class/MatriculaPessoaAutorizada.php

## Uso
```php
// Formulário deve enviar POST para este arquivo
<form action="salvar-cadastro-aluno.php" method="POST">
    // ...campos do formulário
</form>
```

