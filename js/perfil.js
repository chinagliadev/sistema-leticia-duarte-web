const formPerfil = document.querySelector("#formPerfil");
const btnEditarPerfil = document.querySelector("#editarPerfil");
const inputCelular = document.querySelector("#celular");
const inputCPF = document.querySelector("#cpf");

$(document).ready(function () {
  $(inputCelular).mask("(00) 00000-0000");
  $(inputCPF).mask("000.000.000-00");
});

function validarCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

  for (let j = 9; j < 11; j++) {
    let soma = 0;
    for (let i = 0; i < j; i++) soma += parseInt(cpf.charAt(i)) * (j + 1 - i);
    let resto = (soma * 10) % 11;
    if (resto === 10) resto = 0;
    if (resto !== parseInt(cpf.charAt(j))) return false;
  }
  return true;
}

$("#formPerfil").form({
  fields: {
    nome: {
      identifier: "nome",
      rules: [
        {
          type: "empty",
          prompt: "O nome não pode ficar em branco.",
        },
      ],
    },
    email: {
      identifier: "email",
      rules: [
        {
          type: "regExp[/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$/]",
          prompt: "Insira um e-mail válido (ex: usuario@dominio.com).",
        },
      ],
    },
    celular: {
      identifier: "celular",
      rules: [
        {
          type: "regExp[/^\\(\\d{2}\\) \\d{5}-\\d{4}$/]",
          prompt: "Digite o celular completo no formato (99) 99999-9999.",
        },
      ],
    },
    cpf: {
      identifier: "cpf",
      rules: [
        {
          type: "empty",
          prompt: "O CPF não pode ficar em branco.",
        },
      ],
    },
  },
  inline: true,
  on: "blur",
});

inputCPF.addEventListener("blur", function () {
  const value = this.value.trim();
  if (!validarCPF(value)) {
    $("#formPerfil").form("add prompt", "cpf", "CPF inválido! Verifique os dígitos.");
  } else {
    $("#formPerfil").form("remove prompt", "cpf");
  }
});

btnEditarPerfil.addEventListener("click", function () {
  const inputs = formPerfil.querySelectorAll('input[name]:not([type="hidden"])');
  const isEditing = !inputs[0].readOnly;

  if (isEditing) {
    const cpfValido = validarCPF(inputCPF.value);
    const isValidForm = $("#formPerfil").form("is valid");

    if (isValidForm && cpfValido) {
      formPerfil.submit();
    } else {
      $("#formPerfil").form("validate form");
      if (!cpfValido) {
        $("#formPerfil").form("add prompt", "cpf", "CPF inválido! Verifique os dígitos.");
      }
    }
  } else {
    inputs.forEach((input) => (input.readOnly = false));
    btnEditarPerfil.classList.remove("primary");
    btnEditarPerfil.classList.add("green");
    btnEditarPerfil.innerHTML = '<i class="save icon"></i> Salvar';
    setTimeout(() => inputs[0].focus(), 0);
  }
});
