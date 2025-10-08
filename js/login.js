const $ = (s) => document.querySelector(s);
const $$ = (s) => document.querySelectorAll(s);

const container = $("#container");
const registerBtn = $("#register");
const loginBtn = $("#login");
const formCadastro = $(".sign-up form");
const formLogin = $(".sign-in form");

// ========= Funções utilitárias =========
const isMobile = () => window.innerWidth <= 768;
const show = (el, display = "block") => (el.style.display = display);
const hide = (el) => (el.style.display = "none");

// ========= Criar spans de erro para cada campo =========
function criarMsgErro(input) {
  const span = document.createElement("span");
  span.style = "color:red;font-size:14px;display:none;";
  input.insertAdjacentElement("afterend", span);
  return span;
}

// Inputs
const senhaCadastro = $("#passwordCad");
const confirmarSenhaCadastro = $("#passwordConfirm");
const emailCadastro = $("#emailCad");
const inputCelular = $("#celular");
const cpfInput = $("#cpf");
const emailLogin = $("#emailLogin");
const passwordLogin = $("#passwordLogin");

// Mensagens de erro
const msgSenha = criarMsgErro(senhaCadastro);
const msgConfirmarSenha = criarMsgErro(confirmarSenhaCadastro);
const msgEmail = criarMsgErro(emailCadastro);
const msgCelular = criarMsgErro(inputCelular);
const msgCPF = criarMsgErro(cpfInput);

// ========= Limpar campos =========
function limparCampos() {
  [formCadastro, formLogin].forEach((form) => {
    form.querySelectorAll("input").forEach((input) => {
      if (input.type === "checkbox" || input.type === "radio") {
        input.checked = false;
      } else if (input.type !== "hidden") {
        input.value = "";
      }
    });
  });
  [msgSenha, msgConfirmarSenha, msgEmail, msgCelular, msgCPF].forEach(hide);
}

// ========= Alternância Login / Cadastro =========
function toggleForms(isRegister) {
  limparCampos();
  if (isMobile()) {
    show($(".sign-in"), isRegister ? "none" : "block");
    show($(".sign-up"), isRegister ? "block" : "none");
  } else {
    container.classList.toggle("active", isRegister);
  }
}

// Eventos dos botões
registerBtn.addEventListener("click", (e) => {
  e.preventDefault();
  toggleForms(true);
});
loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  toggleForms(false);
});

// Ajuste de layout em resize / load / pageshow
window.addEventListener("resize", () => toggleForms(container.classList.contains("active")));
window.addEventListener("load", () => toggleForms(false));
window.addEventListener("pageshow", (event) => {
  if (event.persisted || (window.performance && performance.getEntriesByType("navigation")[0].type === "back_forward")) {
    limparCampos();
  }
});

// ========= Máscaras =========
inputCelular.addEventListener("input", (e) => {
  let d = e.target.value.replace(/\D/g, "").slice(0, 11);
  e.target.value = d.replace(/(\d{0,2})(\d{0,5})(\d{0,4}).*/, (m, a, b, c) =>
    [a && `(${a}`, b && `) ${b}`, c && `-${c}`].filter(Boolean).join("")
  );
});

cpfInput.addEventListener("input", (e) => {
  let v = e.target.value.replace(/\D/g, "").slice(0, 11);
  e.target.value = v.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2}).*/, "$1.$2.$3-$4").replace(/[-.]$/, "");
});

// ========= Validações =========
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

function validarEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validarCelular(celular) {
  return /^\(\d{2}\) \d{5}-\d{4}$/.test(celular);
}

function validarSintaxeSenha(senha) {
  return [
    [/.{10,}/, "Mínimo de 10 caracteres"],
    [/[A-Z]/, "1 letra maiúscula"],
    [/[a-z]/, "1 letra minúscula"],
    [/[0-9]/, "1 número"],
    [/[^A-Za-z0-9]/, "1 caractere especial"],
  ]
    .filter(([r]) => !r.test(senha))
    .map(([, m]) => m);
}

// ========= Remover espaços =========
function removerEspacos(...inputs) {
  inputs.forEach((input) =>
    input.addEventListener("input", () => (input.value = input.value.replace(/\s/g, "")))
  );
}
removerEspacos(senhaCadastro, confirmarSenhaCadastro, emailCadastro, emailLogin, passwordLogin);

// ========= Funções de erro individual =========
function mostrarErroCampo(msgSpan, msg) {
  msgSpan.innerHTML = msg;
  msgSpan.style.display = "block";
}
function esconderErroCampo(msgSpan) {
  msgSpan.style.display = "none";
}

// ========= Validação Senhas Separada =========
function validarSenhasCampo() {
  const erros = validarSintaxeSenha(senhaCadastro.value);
  if (erros.length) {
    mostrarErroCampo(msgSenha, "Senha inválida:<br>• " + erros.join("<br>• "));
  } else {
    esconderErroCampo(msgSenha);
  }

  if (senhaCadastro.value && confirmarSenhaCadastro.value && senhaCadastro.value !== confirmarSenhaCadastro.value) {
    mostrarErroCampo(msgConfirmarSenha, "As senhas não coincidem.");
  } else {
    esconderErroCampo(msgConfirmarSenha);
  }

  return erros.length === 0 && senhaCadastro.value === confirmarSenhaCadastro.value;
}

// ========= Validações por campo =========
function validarEmailCampo() {
  if (!validarEmail(emailCadastro.value.trim())) {
    mostrarErroCampo(msgEmail, "E-mail inválido! Use o formato exemplo@dominio.com");
    return false;
  } else {
    esconderErroCampo(msgEmail);
    return true;
  }
}

function validarCelularCampo() {
  if (!validarCelular(inputCelular.value.trim())) {
    mostrarErroCampo(msgCelular, "Celular inválido! Use o formato (xx) xxxxx-xxxx");
    return false;
  } else {
    esconderErroCampo(msgCelular);
    return true;
  }
}

function validarCPFCampo() {
  if (!validarCPF(cpfInput.value.trim())) {
    mostrarErroCampo(msgCPF, "CPF inválido! Certifique-se de que contém 11 números e não é repetido.");
    return false;
  } else {
    esconderErroCampo(msgCPF);
    return true;
  }
}

// ========= Eventos de input =========
senhaCadastro.addEventListener("input", validarSenhasCampo);
confirmarSenhaCadastro.addEventListener("input", validarSenhasCampo);
emailCadastro.addEventListener("input", validarEmailCampo);
inputCelular.addEventListener("input", validarCelularCampo);
cpfInput.addEventListener("input", validarCPFCampo);

// ========= Mostrar/Ocultar Senha =========
document.querySelectorAll(".toggle-password").forEach((icon) => {
  icon.addEventListener("click", () => {
    const input = document.querySelector(icon.getAttribute("data-target"));
    const isHidden = input.type === "password";
    input.type = isHidden ? "text" : "password";
    icon.classList.toggle("bi-eye");
    icon.classList.toggle("bi-eye-slash");
  });
});

// ========= Submissão do formulário =========
formCadastro.addEventListener("submit", (e) => {
  const senhasValidas = validarSenhasCampo();
  const emailValido = validarEmailCampo();
  const celularValido = validarCelularCampo();
  const cpfValido = validarCPFCampo();

  if (!senhasValidas || !emailValido || !celularValido || !cpfValido) {
    e.preventDefault();
  }
});