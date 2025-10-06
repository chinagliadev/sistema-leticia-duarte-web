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

// ========= Mensagem de erro =========
const msgErro = document.createElement("span");
msgErro.style = "color:red;font-size:14px;display:none;";

const senhaCadastro = $("#passwordCad");
senhaCadastro.insertAdjacentElement("afterend", msgErro);

// ========= Limpar campos =========
function limparCampos() {
  // limpa todos os inputs de cada formulário
  [formCadastro, formLogin].forEach((form) => {
    form.querySelectorAll("input").forEach((input) => {
      if (input.type !== "hidden" && input.type !== "checkbox" && input.type !== "radio") {
        input.value = "";
      } else if (input.type === "checkbox" || input.type === "radio") {
        input.checked = false;
      }
    });
  });

  hide(msgErro);
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

window.addEventListener("resize", () => toggleForms(container.classList.contains("active")));
window.addEventListener("load", () => toggleForms(false));
window.addEventListener("pageshow", (event) => {
  if (event.persisted || (window.performance && performance.getEntriesByType("navigation")[0].type === "back_forward")) {
    limparCampos();
  }
});

// ========= Máscara Celular =========
const inputCelular = $("#celular");
inputCelular.addEventListener("input", (e) => {
  let d = e.target.value.replace(/\D/g, "").slice(0, 11);
  e.target.value = d.replace(/(\d{0,2})(\d{0,5})(\d{0,4}).*/, (m, a, b, c) =>
    [a && `(${a}`, b && `) ${b}`, c && `-${c}`].filter(Boolean).join("")
  );
});

// ========= CPF =========
const cpfInput = $("#cpf");
cpfInput.addEventListener("input", (e) => {
  let v = e.target.value.replace(/\D/g, "").slice(0, 11);
  e.target.value = v.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2}).*/, "$1.$2.$3-$4").replace(/[-.]$/, "");
});

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

// ========= Validação Senhas =========
const confirmarSenhaCadastro = $("#passwordConfirm");
const emailLogin = $("#emailLogin");
const passwordLogin = $("#passwordLogin");

function removerEspacos(...inputs) {
  inputs.forEach((input) =>
    input.addEventListener("input", () => (input.value = input.value.replace(/\s/g, "")))
  );
}
removerEspacos(senhaCadastro, confirmarSenhaCadastro, emailLogin, passwordLogin);

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

function mostrarErro(msg) {
  msgErro.innerHTML = msg;
  msgErro.style.display = "block";
}

function validarSenhas() {
  if (!senhaCadastro.value && !confirmarSenhaCadastro.value) {
    hide(msgErro);
    return true;
  }

  const erros = validarSintaxeSenha(senhaCadastro.value);
  let msg = "";

  if (erros.length) {
    msg += "Senha inválida:<br>• " + erros.join("<br>• ");
  }

  if (senhaCadastro.value && confirmarSenhaCadastro.value && senhaCadastro.value !== confirmarSenhaCadastro.value) {
    if (msg) msg += "<br>";
    msg += "As senhas não coincidem.";
  }

  if (msg) {
    mostrarErro(msg);
    return false;
  } else {
    hide(msgErro);
    return true;
  }
}

senhaCadastro.addEventListener("input", validarSenhas);
confirmarSenhaCadastro.addEventListener("input", validarSenhas);

formCadastro.addEventListener("submit", (e) => {
  if (!validarSenhas()) e.preventDefault();
});

// ========= Mostrar/Ocultar Senha =========
document.querySelectorAll(".toggle-password").forEach((icon) => {
  icon.addEventListener("click", () => {
    const targetSelector = icon.getAttribute("data-target");
    const input = document.querySelector(targetSelector);
    const isHidden = input.type === "password";

    input.type = isHidden ? "text" : "password";
    icon.classList.toggle("bi-eye");
    icon.classList.toggle("bi-eye-slash");
  });
});