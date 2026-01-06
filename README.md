#  Sistema Leticia Duarte Web

[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)
[![Banco de Dados](https://img.shields.io/badge/MariaDB-10.4%2B-orange.svg)](https://mariadb.org/)
[![Framework UI](https://img.shields.io/badge/Semantic_UI-v2.4-teal.svg)](https://semantic-ui.com/)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)
[![Licença](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## Colaboradores

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/chinagliadev">
        <img src="https://avatars.githubusercontent.com/chinagliadev" width="100px;" alt="Victor Chinaglia"/><br />
        <sub><b>Victor Chinaglia</b></sub>
      </a><br />
      <sub>Desenvolvedor Full Stack</sub>
    </td>
</table>


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

## Estrutura do banco de dados - Sistema Leticia Duarte
[![Banco de Dados](https://img.shields.io/badge/MariaDB-10.4%2B-orange.svg)](https://mariadb.org/)

**Tabela - endereco**


```SQL
CREATE TABLE endereco (
    id_endereco INT(11) NOT NULL AUTO_INCREMENT,
    cep VARCHAR(10) DEFAULT NULL,
    endereco VARCHAR(255) DEFAULT NULL,
    numero INT(11) DEFAULT NULL,
    bairro VARCHAR(100) DEFAULT NULL,
    cidade VARCHAR(100) DEFAULT 'Americana',
    complemento VARCHAR(50) DEFAULT NULL,
    PRIMARY KEY (id_endereco)
);

```
**Tabela - tb_alunos**

```sql
CREATE TABLE tb_alunos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    ra_aluno VARCHAR(100) NOT NULL,
    nome VARCHAR(200) DEFAULT NULL,
    cpf VARCHAR(14) DEFAULT NULL,
    rg VARCHAR(12) DEFAULT NULL,
    data_nascimento DATE DEFAULT NULL,
    etnia VARCHAR(20) DEFAULT NULL,
    turma ENUM('Bercario 2 A','Bercario 2 B','Bercario 2 C','Maternal I A','Maternal I B','Maternal I C','Maternal II A','Maternal II B','Multisseriada M.M','Multisseriada B.M') DEFAULT NULL,
    autorizacao_febre TINYINT(1) DEFAULT 0,
    remedio VARCHAR(100) DEFAULT NULL,
    gotas INT(11) DEFAULT NULL,
    permissao_foto TINYINT(1) DEFAULT 0,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    endereco_id INT(11) DEFAULT NULL,
    funcionario_id INT(11) DEFAULT NULL,
    PRIMARY KEY (id),
    KEY endereco_id (endereco_id),
    KEY funcionario_id (funcionario_id)
);
```
**Tabela - tb_estrutura_familiar**
```sql
CREATE TABLE tb_estrutura_familiar (
    id INT(11) NOT NULL AUTO_INCREMENT,
    pais_vivem_juntos TINYINT(1) DEFAULT NULL,
    numero_filhos INT(11) DEFAULT NULL,
    recebe_bolsa_familia TINYINT(1) DEFAULT NULL,
    valor DECIMAL(10,2) DEFAULT NULL,
    possui_alergia TINYINT(1) DEFAULT NULL,
    especifique_alergia VARCHAR(100) DEFAULT NULL,
    possui_convenio TINYINT(1) DEFAULT NULL,
    qual_convenio VARCHAR(100) DEFAULT NULL,
    portador_necessidade_especial TINYINT(1) DEFAULT NULL,
    qual_necessidade_especial VARCHAR(100) DEFAULT NULL,
    problemas_visao TINYINT(1) DEFAULT NULL,
    ja_fez_cirurgia TINYINT(1) DEFAULT NULL,
    qual_cirurgia VARCHAR(100) DEFAULT NULL,
    vacina_catapora_varicela TINYINT(1) DEFAULT NULL,
    tipo_moradia VARCHAR(255) DEFAULT NULL,
    valor_aluguel DECIMAL(10,2) DEFAULT NULL,
    doenca_anemia TINYINT(1) DEFAULT NULL,
    doenca_bronquite TINYINT(1) DEFAULT NULL,
    doenca_catapora TINYINT(1) DEFAULT NULL,
    doenca_covid TINYINT(4) DEFAULT NULL,
    doenca_cardiaca TINYINT(1) DEFAULT NULL,
    doenca_meningite TINYINT(1) DEFAULT NULL,
    doenca_pneumonia TINYINT(1) DEFAULT NULL,
    doenca_convulsao TINYINT(1) DEFAULT NULL,
    doenca_diabete TINYINT(4) DEFAULT NULL,
    doenca_refluxo TINYINT(1) DEFAULT NULL,
    outras_doencas VARCHAR(100) DEFAULT NULL,
    transporte_carro TINYINT(1) DEFAULT 0,
    transporte_van TINYINT(1) DEFAULT 0,
    transporte_a_pe TINYINT(1) DEFAULT 0,
    transporte_outros_desc VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
);
```
**Tabela - tb_funcionario**

```sql
CREATE TABLE tb_funcionario (
    id_funcionario INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(200) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    senha VARCHAR(255) NOT NULL,
    celular VARCHAR(20) DEFAULT NULL,
    cpf VARCHAR(14) DEFAULT NULL,
    reset_token VARCHAR(6) DEFAULT NULL,
    token_expira DATETIME DEFAULT NULL,
    PRIMARY KEY (id_funcionario)
);
```

**Tabela - tb_pessoas_autorizadas**
```sql
CREATE TABLE tb_pessoas_autorizadas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) DEFAULT NULL,
    cpf VARCHAR(14) DEFAULT NULL,
    celular VARCHAR(20) DEFAULT NULL,
    parentesco VARCHAR(20) DEFAULT NULL,
    PRIMARY KEY (id)
);
```

**Tabela - tb_responsaveis**
```sql
CREATE TABLE tb_responsaveis (
    id_responsavel INT(11) NOT NULL AUTO_INCREMENT,
    tipo_responsavel ENUM('Pai','Mãe','Avô','Avó','Irmão','Irmã','Tio','Tia','Outro') NOT NULL,
    nome VARCHAR(200) DEFAULT NULL,
    data_nascimento DATE DEFAULT NULL,
    estado_civil ENUM('Solteiro','Casado','Divorciado','Viúvo','União Estável') DEFAULT NULL,
    escolaridade ENUM('Fundamental','Médio','Técnico','Superior','Pós-graduação','Outro') NOT NULL,
    celular VARCHAR(20) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    nome_empresa VARCHAR(100) DEFAULT NULL,
    profissao VARCHAR(100) DEFAULT NULL,
    telefone_trabalho VARCHAR(20) DEFAULT NULL,
    horario_trabalho VARCHAR(100) DEFAULT NULL,
    salario DECIMAL(10,2) DEFAULT NULL,
    renda_extra TINYINT(1) DEFAULT NULL,
    valor_renda_extra DECIMAL(10,2) DEFAULT NULL,
    PRIMARY KEY (id_responsavel)
);
```

**Tabela - tb_matricula**
```sql
CREATE TABLE tb_matricula (
    id_matricula INT(11) NOT NULL AUTO_INCREMENT,
    aluno_id INT(11) DEFAULT NULL,
    estrutura_familiar_id INT(11) DEFAULT NULL,
    funcionario_id INT(11) DEFAULT NULL,
    data DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    responsavel_1_id INT(11) DEFAULT NULL,
    responsavel_2_id INT(11) DEFAULT NULL,
    pessoa_autorizada_1_id INT(11) DEFAULT NULL,
    pessoa_autorizada_2_id INT(11) DEFAULT NULL,
    pessoa_autorizada_3_id INT(11) DEFAULT NULL,
    pessoa_autorizada_4_id INT(11) DEFAULT NULL,
    matricula_ativada TINYINT(2) DEFAULT 1,
    PRIMARY KEY (id_matricula),
    KEY aluno_id (aluno_id),
    KEY estrutura_familiar_id (estrutura_familiar_id),
    KEY funcionario_id (funcionario_id),
    KEY responsavel_1_id (responsavel_1_id),
    KEY responsavel_2_id (responsavel_2_id),
    KEY pessoa_autorizada_1_id (pessoa_autorizada_1_id),
    KEY pessoa_autorizada_2_id (pessoa_autorizada_2_id)
);
```

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

## Classes do Projeto

```bash
├── 📦 class/                       
│   ├── Aluno.php  
│   ├── Endereco.php  
│   ├── EstrturaFamiliar.php  
│   ├── Matricula.php  
│   └── MatriculaPessoaAutorizada.php
│   ├── PessoaAutorizada.php
│   ├── Responsavel.php    
```

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

```php

    public function cadastrarAluno($raAluno, $nome,$cpf,$rg=null ,$data_nascimento, $etnia, $turma, $autorizacao_febre, $remedio, $gotas, $permissao_foto, $endereco_id, $funcionario_id){

        $sqlInserir = "INSERT INTO tb_alunos 
        (ra_aluno, nome, cpf, rg, data_nascimento, etnia, turma, autorizacao_febre, remedio, gotas, permissao_foto, endereco_id, funcionario_id)
        VALUES
        (:ra_aluno, :nome, :cpf, :rg, :data_nascimento, :etnia, :turma, :autorizacao_febre, :remedio, :gotas, :permissao_foto, :endereco_id, :funcionario_id)
        ";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':ra_aluno' => $raAluno,
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':rg' => $rg,
            ':data_nascimento' => $data_nascimento,
            ':etnia' => $etnia,
            ':turma' => $turma,
            ':autorizacao_febre' => $autorizacao_febre,
            ':remedio' => $remedio,
            ':gotas' => $gotas,
            ':permissao_foto' => $permissao_foto,
            ':endereco_id' => $endereco_id,
            ':funcionario_id' => $funcionario_id
        ]);

        return $this->conn->lastInsertId();
    }

```

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

***Codigo Endereco.php***

```php
public function cadastrarEndereco($cep, $endereco, $numero, $bairro, $cidade, $complemento = 'Sem complemento'){
        $sqlInserir = "INSERT INTO endereco (cep, endereco, numero, bairro, cidade, complemento) 
                        VALUES 
                        (:cep, :endereco, :numero, :bairro, :cidade, :complemento)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':numero' => $numero,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':complemento' => $complemento
        ]);

         return $this->conn->lastInsertId();
    }
```

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

**Codigo EstruturaFamiliar.php**

```php
  public function cadastrarEstruturaFamiliar(
        $pais_vivem_juntos,
        $numero_filhos,
        $recebe_bolsa_familia,
        $valor,
        $possui_alergia,
        $especifique_alergia,
        $possui_convenio,
        $qual_convenio,
        $portador_necessidade_especial,
        $qual_necessidade_especial,
        $problemas_visao,
        $ja_fez_cirurgia,
        $qual_cirurgia,
        $vacina_catapora_varicela,
        $tipo_moradia = null,
        $valor_aluguel,
        $doenca_anemia,
        $doenca_bronquite,
        $doenca_cardiaca,
        $doenca_covid,
        $doenca_catapora,
        $doenca_convulsao,
        $doenca_diabetes,
        $doenca_meningite,
        $doenca_pneumonia,
        $doenca_refluxo,
        $doenca_outra,
        $transporte_carro,
        $transporte_van,
        $transporte_a_pe,
        $transporte_outros_desc
    ) {

        $sqlInserir = "INSERT INTO tb_estrutura_familiar (
    pais_vivem_juntos, numero_filhos, recebe_bolsa_familia, valor, possui_alergia, especifique_alergia,
    possui_convenio, qual_convenio, portador_necessidade_especial, qual_necessidade_especial,
    problemas_visao, ja_fez_cirurgia, qual_cirurgia,
    vacina_catapora_varicela, tipo_moradia, valor_aluguel, doenca_anemia, doenca_bronquite, doenca_catapora, doenca_covid, doenca_cardiaca,
    doenca_meningite, doenca_pneumonia, doenca_convulsao, 
    doenca_diabete, doenca_refluxo, outras_doencas,
    transporte_carro, transporte_van, transporte_a_pe, transporte_outros_desc
) 
VALUES (
    :pais_vivem_juntos, :numero_filhos, :recebe_bolsa_familia, :valor, :possui_alergia, :especifique_alergia,
    :possui_convenio, :qual_convenio, :portador_necessidade_especial, :qual_necessidade_especial,
    :problemas_visao, :ja_fez_cirurgia, :qual_cirurgia,
    :vacina_catapora_varicela, :tipo_moradia, :valor_aluguel, :doenca_anemia, :doenca_bronquite, :doenca_catapora, :doenca_covid, :doenca_cardiaca,
    :doenca_meningite, :doenca_pneumonia, :doenca_convulsao, 
    :doenca_diabete, :doenca_refluxo, :outras_doencas,
    :transporte_carro, :transporte_van, :transporte_a_pe, :transporte_outros_desc
)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            'pais_vivem_juntos' => $pais_vivem_juntos,
            'numero_filhos' => $numero_filhos,
            'recebe_bolsa_familia' => $recebe_bolsa_familia,
            'valor' => $valor,
            'possui_alergia' => $possui_alergia,
            'especifique_alergia' => $especifique_alergia,
            'possui_convenio' => $possui_convenio,
            'qual_convenio' => $qual_convenio,
            'portador_necessidade_especial' => $portador_necessidade_especial,
            'qual_necessidade_especial' => $qual_necessidade_especial,
            'problemas_visao' => $problemas_visao,
            'ja_fez_cirurgia' => $ja_fez_cirurgia,
            'qual_cirurgia' => $qual_cirurgia,
            'vacina_catapora_varicela' => $vacina_catapora_varicela,
            'tipo_moradia' => $tipo_moradia,
            'valor_aluguel' => $valor_aluguel,
            'doenca_anemia' => $doenca_anemia,
            'doenca_bronquite' => $doenca_bronquite,
            'doenca_catapora' => $doenca_catapora,
            'doenca_covid' => $doenca_covid,
            'doenca_cardiaca' => $doenca_cardiaca,
            'doenca_meningite' => $doenca_meningite,
            'doenca_pneumonia' => $doenca_pneumonia,
            'doenca_convulsao' => $doenca_convulsao,
            'doenca_diabete' => $doenca_diabetes, 
            'doenca_refluxo' => $doenca_refluxo,
            'outras_doencas' => $doenca_outra,
            'transporte_carro' => $transporte_carro,
            'transporte_van' => $transporte_van,
            'transporte_a_pe' => $transporte_a_pe,
            'transporte_outros_desc' => $transporte_outros_desc
        ]);

        return $this->conn->lastInsertId();
    }
```
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

**Codigo Pessoa Autorizada**
```php
public function cadastrarPessoaAutorizada($nome, $cpf, $celular, $parentesco){

        $sqlInserir = "INSERT INTO tb_pessoas_autorizadas (nome, cpf, celular, parentesco) VALUES (:nome, :cpf, :celular, :parentesco)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":nome" => $nome,
            ":cpf" => $cpf,
            ":celular" => $celular,
            ":parentesco" => $parentesco
        ]);


        return $this->conn->lastInsertId();
    }
```

---
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

**Codigo Responsavel.php**
```php

    public function cadastrarResponsavel(
        $tipo_responsavel,
        $nome,
        $data_nascimento,
        $estado_civil,
        $escolaridade,
        $celular,
        $email,
        $nome_empresa,
        $profissao,
        $telefone_trabalho,
        $horario_trabalho,
        $salario,
        $renda_extra,
        $valor_renda_extra
    ) {
        $sqlInserir = "INSERT INTO tb_responsaveis
            (tipo_responsavel, nome, data_nascimento, estado_civil, escolaridade, celular, email, nome_empresa, profissao, telefone_trabalho, horario_trabalho, salario, renda_extra, valor_renda_extra)
            VALUES
            (:tipo_responsavel, :nome, :data_nascimento, :estado_civil, :escolaridade, :celular, :email, :nome_empresa, :profissao, :telefone_trabalho, :horario_trabalho, :salario, :renda_extra, :valor_renda_extra)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':tipo_responsavel' => $tipo_responsavel,
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':estado_civil' => $estado_civil,
            ':escolaridade' => $escolaridade,
            ':celular' => $celular,
            ':email' => $email,
            ':nome_empresa' => $nome_empresa,
            ':profissao' => $profissao,
            ':telefone_trabalho' => $telefone_trabalho,
            ':horario_trabalho' => $horario_trabalho,
            ':salario' => $salario,
            ':renda_extra' => $renda_extra,
            ':valor_renda_extra' => $valor_renda_extra
        ]);

        return $this->conn->lastInsertId();
    }
```

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


**Codigo Matricula.php**
```php

    public function cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id, $pessoa_autorizada_1_id, $pessoa_autorizada_2_id, $pessoa_autorizada_3_id, $pessoa_autorizada_4_id)
    {
        $sqlInserir = "INSERT INTO tb_matricula 
                         (aluno_id, estrutura_familiar_id, funcionario_id, responsavel_1_id, responsavel_2_id, pessoa_autorizada_1_id, pessoa_autorizada_2_id, pessoa_autorizada_3_id, pessoa_autorizada_4_id) 
                         VALUES 
                         (:aluno_id, :estrutura_familiar_id, :funcionario_id, :responsavel_1_id, :responsavel_2_id, :pessoa_autorizada_1_id, :pessoa_autorizada_2_id, :pessoa_autorizada_3_id, :pessoa_autorizada_4_id)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":aluno_id" => $aluno_id,
            ":estrutura_familiar_id" => $estrutura_familiar_id,
            ":funcionario_id" => $funcionario_id,
            ":responsavel_1_id" => $responsavel_1_id,
            ":responsavel_2_id" => $responsavel_2_id,
            ":pessoa_autorizada_1_id" => $pessoa_autorizada_1_id,
            ":pessoa_autorizada_2_id" => $pessoa_autorizada_2_id,
            ":pessoa_autorizada_3_id" => $pessoa_autorizada_3_id,
            ":pessoa_autorizada_4_id" => $pessoa_autorizada_4_id
        ]);

        return $this->conn->lastInsertId();
    }


    public function listarMatricula(): array
    {
        $sqlListar =
            "SELECT 
        tb_alunos.id, 
        tb_alunos.ra_aluno, 
        tb_alunos.nome AS nome_aluno, 
        tb_alunos.data_nascimento, 
        tb_alunos.turma, 
        tb_responsaveis.nome AS nome_responsavel,
        tb_matricula.matricula_ativada AS matricula
            FROM tb_matricula
        INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
        INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
        WHERE matricula_ativada = 1;
";

        $dados = $this->conn->query($sqlListar)->fetchAll();
        return $dados;
    }

    public function listarMatriculaDesativada(): array
    {
        $sqlListar =
            "SELECT 
        tb_alunos.id, 
        tb_alunos.ra_aluno, 
        tb_alunos.nome AS nome_aluno, 
        tb_alunos.data_nascimento, 
        tb_alunos.turma, 
        tb_responsaveis.nome AS nome_responsavel,
        tb_matricula.matricula_ativada AS matricula
            FROM tb_matricula
        INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
        INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
        WHERE matricula_ativada = 0;
";

        $dados = $this->conn->query($sqlListar)->fetchAll();
        return $dados;
    }

    public function desativarMatricula($idAluno): bool
    {
        $sqlDesativarMatricula = "UPDATE tb_matricula 
                                  SET matricula_ativada = :situacao WHERE aluno_id = :id
        ";

        $dadosDesativarMatricula = $this->conn->prepare($sqlDesativarMatricula);
        $dadosDesativarMatricula->execute([
            ':situacao' => self::MATRICULA_DESATIVADA,
            ':id' => $idAluno
        ]);

        return $dadosDesativarMatricula->rowCount() > 0;
    }

    public function reativarMatricula($idAluno): bool
    {
        $sqlAtivarMatricula = "UPDATE tb_matricula 
                                  SET matricula_ativada = :situacao WHERE aluno_id = :id
        ";

        $dadosAtivarMatricula = $this->conn->prepare($sqlAtivarMatricula);
        $dadosAtivarMatricula->execute([
            ':situacao' => self::MATRICULA_ATIVA,
            ':id' => $idAluno
        ]);

        return $dadosAtivarMatricula->rowCount() > 0;
    }

    public function buscarDadosCompletosAluno($ra_aluno)
    {
        $dadosCompletos = [
            'aluno' => null,
            'endereco' => null,
            'matricula' => null,
            'responsavel_1' => null,
            'responsavel_2' => null,
            'estrutura_familiar' => null,
            'pessoa_autorizada_1' => null,
            'pessoa_autorizada_2' => null,
            'pessoa_autorizada_3' => null, 
            'pessoa_autorizada_4' => null  
        ];

        $sqlIdAluno = "SELECT id FROM tb_alunos WHERE ra_aluno = :ra_aluno";
        $stmtId = $this->conn->prepare($sqlIdAluno);
        $stmtId->execute([':ra_aluno' => $ra_aluno]);
        $idAluno = $stmtId->fetchColumn();

        if (!$idAluno) {
            return false;
        }

        $sqlMatricula = "SELECT * FROM tb_matricula WHERE aluno_id = :aluno_id";
        $stmtMatricula = $this->conn->prepare($sqlMatricula);
        $stmtMatricula->execute([':aluno_id' => $idAluno]);
        $dadosCompletos['matricula'] = $stmtMatricula->fetch();

        if (!$dadosCompletos['matricula']) {
            return false;
        }

        $matricula = $dadosCompletos['matricula'];

        $resp1_id = $matricula['responsavel_1_id'];
        $resp2_id = $matricula['responsavel_2_id'];
        $estrutura_id = $matricula['estrutura_familiar_id'];
        $pessoa_autorizada_1_id = $matricula['pessoa_autorizada_1_id'];
        $pessoa_autorizada_2_id = $matricula['pessoa_autorizada_2_id'];
        $pessoa_autorizada_3_id = $matricula['pessoa_autorizada_3_id']; // Novo
        $pessoa_autorizada_4_id = $matricula['pessoa_autorizada_4_id']; // Novo

        $sqlAluno = "SELECT * FROM tb_alunos WHERE id = :id";
        $stmtAluno = $this->conn->prepare($sqlAluno);
        $stmtAluno->execute([':id' => $idAluno]);
        $dadosCompletos['aluno'] = $stmtAluno->fetch();

        $endereco_id = $dadosCompletos['aluno']['endereco_id'] ?? null;

        $buscarPorId = function ($tabela, $colunaId, $id) {
            if (!$id) return null;
            $sql = "SELECT * FROM $tabela WHERE $colunaId = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        };

        $dadosCompletos['endereco'] = $buscarPorId('endereco', 'id_endereco', $endereco_id);
        $dadosCompletos['responsavel_1'] = $buscarPorId('tb_responsaveis', 'id_responsavel', $resp1_id);
        $dadosCompletos['responsavel_2'] = $buscarPorId('tb_responsaveis', 'id_responsavel', $resp2_id);
        $dadosCompletos['estrutura_familiar'] = $buscarPorId('tb_estrutura_familiar', 'id', $estrutura_id);
        $dadosCompletos['pessoa_autorizada_1'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_1_id);
        $dadosCompletos['pessoa_autorizada_2'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_2_id);
        $dadosCompletos['pessoa_autorizada_3'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_3_id); // Novo
        $dadosCompletos['pessoa_autorizada_4'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_4_id); // Novo

        return $dadosCompletos;
    }
```


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
**salvar-cadastro-aluno.php**

```php
<?php
session_start();

require './class/Aluno.php';
require './class/Responsavel.php';
require './class/Endereco.php';
require './class/PessoaAutorizada.php';
require './class/EstrturaFamiliar.php';
require './class/Matricula.php';
require './class/MatriculaPessoaAutorizada.php';
require './config.php';

function limparValorMonetario($valor)
{
    if (is_null($valor) || $valor === '') {
        return null;
    }
    $valor = str_replace(['R$', ' ', '.'], '', $valor);
    $valor = str_replace(',', '.', $valor);
    return (float) $valor;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['txtNomeCrianca'] ?? null;
    $cpfAluno = $_POST['txtCpfAluno'] ?? null;
    $rg = $_POST['txtRgAluno'] ?? null;
    $raAluno = $_POST['txtRaAluno'] ?? null;

    var_dump($raAluno);
    $turma = $_POST['turma'] ?? null;
    $dataNascimento = $_POST['data_nascimento'] ?? null;
    $corRaca = $_POST['corRaca'] ?? null;

    $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;
    $remedio = $autorizacaoMed ? ($_POST['txtRemedio'] ?? null) : null;
    $gotas = $autorizacaoMed ? ($_POST['txtGotas'] ?? null) : null;
    $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

    $cep = $_POST['txtCep'] ?? null;
    $logradouro = $_POST['txtEndereco'] ?? null;
    $numero = $_POST['txtNumero'] ?? null;
    $bairro = $_POST['txtBairro'] ?? null;
    $cidade = $_POST['txtCidade'] ?? null;
    $complemento = $_POST['txtComplemento'] ?? null;

    $pais_vivem_juntos = isset($_POST['pais_vivem_juntos']) ? 1 : 0;

    $recebe_bolsa_familia = isset($_POST['recebe_bolsa_familia']) ? 1 : 0;

    $possui_alergia = isset($_POST['possui_alergia']) ? 1 : 0;
    $especifique_alergia = $possui_alergia ? ($_POST['especifique_alergia'] ?? null) : null;

    $possui_convenio = isset($_POST['possui_convenio']) ? 1 : 0;
    $qual_convenio = $possui_convenio ? ($_POST['qual_convenio'] ?? null) : null;

    $portador_necessidade_especial = isset($_POST['portador_necessidade_especial']) ? 1 : 0;
    $qual_necessidade_especial = $portador_necessidade_especial ? ($_POST['qual_necessidade'] ?? null) : null;

    $problemas_visao = isset($_POST['problemas_visao']) ? 1 : 0;

    $ja_fez_cirurgia = isset($_POST['ja_fez_cirurgia']) ? 1 : 0;
    $qual_cirurgia = $ja_fez_cirurgia ? ($_POST['qual_cirurgia'] ?? null) : null;

    $vacina_catapora_varicela = isset($_POST['vacina_catapora_varicela']) ? 1 : 0;

    $tipo_moradia = $_POST['tipo_moradia'] ?? null;

    $valor_aluguel = ($tipo_moradia === 'alugada')
        ? ($_POST['txtValorAluguel'] ?? null)
        : null;

    $valor_aluguel = limparValorMonetario($valor_aluguel);

    $numero_filhos               = $_POST['numero_filhos'] ?? null;

    $valor                       = $recebe_bolsa_familia ? ($_POST['valor'] ?? null) : null;
    $valor = limparValorMonetario($valor);
    
    $doenca_anemia     = isset($_POST['doenca_anemia']) ? 1 : 0;
    $doenca_bronquite  = isset($_POST['doenca_bronquite']) ? 1 : 0;
    $doenca_catapora   = isset($_POST['doenca_catapora']) ? 1 : 0;
    $doenca_covid      = isset($_POST['doenca_covid']) ? 1 : 0;
    $doenca_cardiaca   = isset($_POST['doenca_cardiaca']) ? 1 : 0;
    $doenca_meningite  = isset($_POST['doenca_meningite']) ? 1 : 0;
    $doenca_pneumonia  = isset($_POST['doenca_pneumonia']) ? 1 : 0;
    $doenca_convulsao  = isset($_POST['doenca_convulsao']) ? 1 : 0;
    $doenca_diabete    = isset($_POST['doenca_diabete']) ? 1 : 0;
    $doenca_refluxo    = isset($_POST['doenca_refluxo']) ? 1 : 0;
    $outras_doencas    = $_POST['outras_doencas'] ?? null;

    $transporte_carro       = isset($_POST['transporte_carro']) ? 1 : 0;
    $transporte_van         = isset($_POST['transporte_van']) ? 1 : 0;
    $transporte_a_pe        = isset($_POST['transporte_pe']) ? 1 : 0;
    $transporte_outros_desc = isset($_POST['transporte_outros_desc']) ? 1 : 0;

    $estruturaFamiliar = new EstruturaFamiliar();
    $estrutura_familiar_id = $estruturaFamiliar->cadastrarEstruturaFamiliar(
        $pais_vivem_juntos,
        $numero_filhos,
        $recebe_bolsa_familia,
        $valor,
        $possui_alergia,
        $especifique_alergia,
        $possui_convenio,
        $qual_convenio,
        $portador_necessidade_especial,
        $qual_necessidade_especial,
        $problemas_visao,
        $ja_fez_cirurgia,
        $qual_cirurgia,
        $vacina_catapora_varicela,
        $tipo_moradia,
        $valor_aluguel,
        $doenca_anemia,
        $doenca_bronquite,
        $doenca_catapora,
        $doenca_covid,
        $doenca_cardiaca,
        $doenca_meningite,
        $doenca_pneumonia,
        $doenca_convulsao,
        $doenca_diabete,
        $doenca_refluxo,
        $outras_doencas,
        $transporte_carro,
        $transporte_van,
        $transporte_a_pe,
        $transporte_outros_desc
    );

    $responsavel = new Responsavel();

    $tipo_responsavel_1     = $_POST['txtTipoResponsavel_1'] ?? null;
    $nome_responsavel_1     = $_POST['txtNomeResponsavel_1'] ?? null;
    $data_nascimento_1      = $_POST['data_nascimento_1'] ?? null;
    $estado_civil_1         = $_POST['txtEstadoCivil_1'] ?? null;
    $escolaridade_1         = $_POST['txtEscolaridade'] ?? 'Não informado';
    $celular_1              = $_POST['txtTelefone_1'] ?? null;
    $email_1                = $_POST['txtEmail_1'] ?? null;
    $nome_empresa_1         = $_POST['txtNomeEmpresa_1'] ?? null;
    $profissao_1            = $_POST['txtProfissao_1'] ?? null;
    $telefone_trabalho_1    = $_POST['txtTelefoneTrabalho_1'] ?? null;
    $horario_trabalho_1     = $_POST['txtHorarioTrabalho_1'] ?? null;
    $salario_1              = $_POST['txtSalario_1'] ?? null;
    $renda_extra_1          = isset($_POST['toggleRendaExtra_1']) ? 1 : 0;
    $valor_renda_extra      = $_POST['txtRendaExtra'] ?? null;

    $salario_1 = limparValorMonetario($salario_1);
    $valor_renda_extra = limparValorMonetario($valor_renda_extra);

    $responsavel_1_id = $responsavel->cadastrarResponsavel(
        $tipo_responsavel_1,
        $nome_responsavel_1,
        $data_nascimento_1,
        $estado_civil_1,
        $escolaridade_1,
        $celular_1,
        $email_1,
        $nome_empresa_1,
        $profissao_1,
        $telefone_trabalho_1,
        $horario_trabalho_1,
        $salario_1,
        $renda_extra_1,
        $valor_renda_extra
    );

    if (!empty($_POST['txtNomeResponsavel_2'])) {
        $tipo_responsavel_2     = $_POST['txtTipoResponsavel_2'] ?? null;
        $nome_responsavel_2     = $_POST['txtNomeResponsavel_2'] ?? null;
        $data_nascimento_2      = $_POST['data_nascimento_2'] ?? null;
        $estado_civil_2         = $_POST['txtEstadoCivil_2'] ?? 'Não informado';
        $escolaridade_2         = $_POST['txtEscolaridade_2'] ?? 'Não informado';
        $celular_2              = $_POST['txtTelefone_2'] ?? null;
        $email_2                = $_POST['txtEmail_2'] ?? null;
        $nome_empresa_2         = $_POST['txtNomeEmpresa_2'] ?? null;
        $profissao_2            = $_POST['txtProfissao_2'] ?? null;
        $telefone_trabalho_2    = $_POST['txtTelefoneTrabalho_2'] ?? null;
        $horario_trabalho_2     = $_POST['txtHorarioTrabalho_2'] ?? null;
        $salario_2              = $_POST['txtSalario_2'] ?? null;
        $renda_extra_2          = isset($_POST['toggleRendaExtra_2']) ? 1 : 0;
        $valor_renda_extra_2    = $_POST['txtRendaExtra_2'] ?? null;

        $salario_2 = limparValorMonetario($salario_2);
        $valor_renda_extra_2 = limparValorMonetario($valor_renda_extra_2);

        $responsavel_2_id = $responsavel->cadastrarResponsavel(
            $tipo_responsavel_2,
            $nome_responsavel_2,
            $data_nascimento_2,
            $estado_civil_2,
            $escolaridade_2,
            $celular_2,
            $email_2,
            $nome_empresa_2,
            $profissao_2,
            $telefone_trabalho_2,
            $horario_trabalho_2,
            $salario_2,
            $renda_extra_2,
            $valor_renda_extra_2
        );
    }

    $aluno = new Aluno();
    $enderecoObj = new Endereco();
    $funcionario_id = $_SESSION['usuario']['id'] ?? null;

    $endereco_id = $enderecoObj->cadastrarEndereco(
        $cep,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $complemento
    );

    $aluno_id = $aluno->cadastrarAluno(
        $raAluno,
        $nome,
        $cpfAluno,
        $rg,
        $dataNascimento,
        $corRaca,
        $turma,
        $autorizacaoMed,
        $remedio,
        $gotas,
        $autorizacaoImagem,
        $endereco_id,
        $funcionario_id
    );

    var_dump($aluno_id);
    // Pessoa autorizada 1
    $txtNomePessoaAutorizada = $_POST['txtNomePessoaAutorizada'] ?? null;
    $txtCpfAutorizada = $_POST['txtCpfAutorizada'] ?? null;
    $txtTelefoneAutorizada = $_POST['txtTelefoneAutorizada'] ?? null;
    $txtParentesnco = $_POST['txtParentenco'] ?? null;

    $pessoa_autorizada = new PessoaAutorizada();
    $pessoa_autorizada_id = $pessoa_autorizada->cadastrarPessoaAutorizada(
        $txtNomePessoaAutorizada,
        $txtCpfAutorizada,
        $txtTelefoneAutorizada,
        $txtParentesnco
    );

    // Pessoa autorizada 2
    if (!empty($_POST['txtNomePessoaAutorizada2'])) {
        $txtNomePessoaAutorizada2 = $_POST['txtNomePessoaAutorizada2'] ?? null;
        $txtCpfAutorizada2 = $_POST['txtCpfAutorizada2'] ?? null;
        $txtTelefoneAutorizada2 = $_POST['txtTelefoneAutorizada2'] ?? null;
        $txtParentesco2 = $_POST['txtParentenco2'] ?? null;

        $pessoa_autorizada2 = new PessoaAutorizada();
        $pessoa_autorizada_id_2 = $pessoa_autorizada2->cadastrarPessoaAutorizada(
            $txtNomePessoaAutorizada2,
            $txtCpfAutorizada2,
            $txtTelefoneAutorizada2,
            $txtParentesco2
        );
    }

    // Pessoa autorizada 3
    if (!empty($_POST['txtNomePessoaAutorizada3'])) {
        $txtNomePessoaAutorizada3 = $_POST['txtNomePessoaAutorizada3'] ?? null;
        $txtCpfAutorizada3 = $_POST['txtCpfAutorizada3'] ?? null;
        $txtTelefoneAutorizada3 = $_POST['txtTelefoneAutorizada3'] ?? null;
        $txtParentesco3 = $_POST['txtParentenco3'] ?? null;

        $pessoa_autorizada3 = new PessoaAutorizada();
        $pessoa_autorizada_id_3 = $pessoa_autorizada3->cadastrarPessoaAutorizada(
            $txtNomePessoaAutorizada3,
            $txtCpfAutorizada3,
            $txtTelefoneAutorizada3,
            $txtParentesco3
        );
    }

    // Pessoa autorizada 4
    if (!empty($_POST['txtNomePessoaAutorizada4'])) {
        $txtNomePessoaAutorizada4 = $_POST['txtNomePessoaAutorizada4'] ?? null;
        $txtCpfAutorizada4 = $_POST['txtCpfAutorizada4'] ?? null;
        $txtTelefoneAutorizada4 = $_POST['txtTelefoneAutorizada4'] ?? null;
        $txtParentesco4 = $_POST['txtParentenco4'] ?? null;

        $pessoa_autorizada4 = new PessoaAutorizada();
        $pessoa_autorizada_id_4 = $pessoa_autorizada4->cadastrarPessoaAutorizada(
            $txtNomePessoaAutorizada4,
            $txtCpfAutorizada4,
            $txtTelefoneAutorizada4,
            $txtParentesco4
        );
    }

    $matricula = new Matricula();
    $matricula_id = $matricula->cadastrarMatricula(
    $aluno_id,
    $estrutura_familiar_id,
    $funcionario_id,
    $responsavel_1_id,
    $responsavel_2_id,
    $pessoa_autorizada_id,
    $pessoa_autorizada_id_2 ?? null,
    $pessoa_autorizada_id_3 ?? null,
    $pessoa_autorizada_id_4 ?? null
);

    $matriculaPessoaAutorizada = new matriculaPessoaAutorizada();
    $matriculaPessoaAutorizada->cadastrarMatriculaPessoaAutorizada($matricula_id, $pessoa_autorizada_id);

    header('location: ./cadastrados.php');
}
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
---

# desativar-cadastro-aluno.php
[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)

## Descrição
Arquivo PHP responsável por desativar (marcar como inativa) a matrícula de um aluno no sistema. Recebe requisição POST com o identificador do aluno, valida a entrada, executa a rotina de negócio para alterar o status no banco e redireciona para a página de listagem.

## Principais funcionalidades
- Recebe POST com o campo `id_aluno`.
- Validação básica do input (`isset` / não vazio).
- Chamada ao método de domínio para desativar a matrícula (ex.: `Matricula::desativarMatricula($id)`).
- Redirecionamento para a lista de matriculados (`cadastrados.php`) após execução.
- Registra mensagens de sucesso/erro via sessão ou direciona com HTTP status adequado.

## Fluxo resumido
1. Verifica método da requisição: POST.
2. Lê e sanitiza `$_POST['id_aluno']`.
3. Instancia a classe de matrícula e chama o método de desativação.
4. Tratar retorno/erros e redirecionar para `cadastrados.php`.


## Dependências
- config.php (conexão com BD)
- class/Matricula.php (método `desativarMatricula`)
- sessões iniciadas para mensagens (session_start())
- página de listagem: cadastrados.php


## Saída esperada
- Redirecionamento para `cadastrados.php`.
- Mensagem de sucesso/erro disponível na sessão para exibição ao usuário.

```php
<?php

include './class/Matricula.php';
include './config.php';

echo "<h1>excluir-cadastro-aluno.php</h1>";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id_aluno = $_POST['id_aluno'] ?? null;

    if($id_aluno !== null){
        $matricula = new Matricula();
        
        $matricula->desativarMatricula($id_aluno); 
        header('location: ./cadastrados.php');

    }
}
```

# detalhes-aluno.php
[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)

## Descrição
Página responsável por exibir os detalhes de um aluno. Recupera os dados pelo ID (via GET), normaliza o retorno (array/objeto) e apresenta informações pessoais, responsaveis, endereço e status da matrícula, pessoa autorizada a busca-lo e estrutura familiar. Caso o aluno não exista, redireciona para a lista com mensagem de erro.

## Principais funcionalidades
- Recebe parâmetro `id` via GET
- Inicia sessão e garante inclusão de configuração (`config.php`) e, se disponível, a classe `Aluno`.
- Tenta obter dados usando métodos da classe `Aluno` (quando existir).

## Fluxo resumido
1. session_start() para mensagens/controle.
2. Pega o id do aluno atraves do metodo get e assim passa como parametro o id no aluno no metodo 
```php
buscarDadosCompletosAluno($idAluno)
```

```php
$dadosCompleto = $matricula->buscarDadosCompletosAluno($idAluno);
```
## Dependências
- config.php (conexão com BD, p.ex. variável $pdo)
- class/Aluno.php (opcional; melhora reutilização)
- template/menuLateral.php (layout)
- CSS/JS: Semantic UI, css/sistema.css, js/semantic_ui.js, js/validacao-formulario.js
- cadastrados.php (página de listagem para redirecionamento)

**Codigo Detalhes Aluno**

```php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idAluno = $_GET['idAluno'];

    $matricula = new Matricula();
    $dadosCompleto = $matricula->buscarDadosCompletosAluno($idAluno);

    $aluno = $dadosCompleto['aluno'];
    $endereco = $dadosCompleto['endereco'];
    $responsavel = $dadosCompleto['responsavel_1'];
    $responsavel2 = $dadosCompleto['responsavel_2'];
    $estrutura_familiar = $dadosCompleto['estrutura_familiar'];
    $pessoa_autorizada_1 = $dadosCompleto['pessoa_autorizada_1'];
    $pessoa_autorizada_2 = $dadosCompleto['pessoa_autorizada_2'];
    $pessoa_autorizada_3 = $dadosCompleto['pessoa_autorizada_3'];
    $pessoa_autorizada_4 = $dadosCompleto['pessoa_autorizada_4'];
}

?>
```
# editar-aluno.php
[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)

# editar-aluno.php

[![Versão PHP](https://img.shields.io/badge/PHP-v7.4%2B-blue.svg)](https://www.php.net/)

## Descrição
Página que carrega os dados completos de um aluno para edição e exibe o formulário pré‑preenchido. Os dados são recuperados via a camada de matrícula (classe `Matricula`) e os partials de formulário (template/cadastro_aluno) são usados para renderizar seções reutilizáveis. O formulário envia para `salvar-edicao-aluno.php`.

## Acesso
URL típica:
```
editar-aluno.php?idAluno=123
```
- Parâmetro obrigatório: `idAluno` (GET)

## Principais responsabilidades
- Validar presença de `idAluno` e abortar com mensagem em caso de ausência.
- Recuperar dados via:
  ```php
  $matricula = new Matricula();
  $dadosCompletos = $matricula->buscarDadosCompletosAluno($ra_aluno);
  ```
- Normalizar retorno em arrays:
  - `$aluno`, `$endereco`, `$responsavel_1`, `$responsavel_2`, `$estrutura_familiar`
  - `$pessoa_autorizada_1` ... `$pessoa_autorizada_4`
- Incluir partials do formulário:
  - `template/cadastro_aluno/aluno.php`
  - `template/cadastro_aluno/responsavel.php`
  - `template/cadastro_aluno/estrutura-familiar.php`
- Preencher campos via JavaScript (valores inline gerados pelo PHP).
- Acionar validações cliente com `validarFormularioCompleto('editar')` antes de submeter.

## Formulário / Destino
- Método: `POST`
- Action: `./salvar-edicao-aluno.php`
- Observação: existe um input hidden:
  ```html
  <input type="hidden" name="id_aluo" value="<?= $aluno['id'] ?>">
  ```
  - Verificar se o nome `id_aluo` é intencional; esperado `id_aluno` no processamento backend.

## Dependências (front / back)
- Back-end:
  - `config.php` (conexão/setting)
  - `class/Matricula.php`
- Front-end:
  - Semantic UI CSS/JS (CDN)
  - Semantic UI Calendar (CDN)
  - jQuery (CDN)
  - `js/semantic_ui.js`
  - `js/validacao-formulario.js`
  - `jquery.mask` (CDN carregado no final)
- Templates/partials:
  - `template/menuLateral.php`
  - `template/modal/modal-formulario-invalido.php`
  - `template/modal/modal-editar-cadastro.php`

## Interações JS relevantes
- Botão de salvar chama:
  ```js
  validarFormularioCompleto('editar')
  ```
  - Esta função valida todas as seções (aluno, responsáveis, autorizadas, estrutura familiar) e deve submeter o formulário se tudo OK.
- Máscaras e calendários aplicados por `semantic_ui.js`.
- Campos preenchidos no `$(document).ready()` com valores vindos do PHP.

## Saídas / Comportamento
- Em caso de aluno não encontrado: `die("Erro: Aluno não encontrado.")`
- Em caso de sucesso da edição: redirecionamento / mensagem a cargo de `salvar-edicao-aluno.php`.

## Segurança e validações sugeridas
- Validar/filtrar `idAluno` (ex.: `filter_input(INPUT_GET, 'idAluno', FILTER_VALIDATE_INT)`).
- Proteger rota com verificação de sessão/autenticação (incluir `auth.php`).
- Escapar/encodar toda saída (já usado `htmlspecialchars()` em vários campos).
- Implementar CSRF token no formulário.
- Confirmar nomes de campos (ex.: fixar `id_aluno` no hidden) e corresponder ao backend.

## Melhoria/Observações rápidas
- Conferir consistência de nomes de campo ao salvar (`id_aluo` → `id_aluno`).
- Centralizar preenchimento de campos em uma função JS para reduzir repetição.
- Preferir Prepared Statements/Transações em `salvar-edicao-aluno.php`.

## Exemplo mínimo de uso
1. Acessar: `editar-aluno.php?idAluno=42`
2. Editar campos no formulário.
3. Clicar em "Editar Cadastro" — validação cliente executa; se OK, submete para `salvar-edicao-aluno.php`.
