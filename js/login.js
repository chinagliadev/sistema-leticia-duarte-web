const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

function isMobile() {
  return window.innerWidth <= 768;
}

registerBtn.addEventListener("click", (e) => {
  e.preventDefault();
  if (isMobile()) {
    document.querySelector(".sign-in").style.display = "none";
    document.querySelector(".sign-up").style.display = "block";
  } else {
    container.classList.add("active");
  }
});

loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  if (isMobile()) {
    document.querySelector(".sign-in").style.display = "block";
    document.querySelector(".sign-up").style.display = "none";
  } else {
    container.classList.remove("active");
  }
});

// Garante que o layout se ajuste ao redimensionar
window.addEventListener("resize", () => {
  if (isMobile()) {
    const isLoginVisible = container.classList.contains("active") === false;
    document.querySelector(".sign-in").style.display = isLoginVisible ? "block" : "none";
    document.querySelector(".sign-up").style.display = isLoginVisible ? "none" : "block";
  } else {
    document.querySelector(".sign-in").style.display = "block";
    document.querySelector(".sign-up").style.display = "block";
  }
});

// Inicializa o layout corretamente ao carregar
window.addEventListener("load", () => {
  if (isMobile()) {
    document.querySelector(".sign-in").style.display = "block";
    document.querySelector(".sign-up").style.display = "none";
  }
});

// ====== Máscara Celular ======
const inputCelular = document.getElementById('celular');

inputCelular.addEventListener('input', function (e) {
  let el = e.target;
  let digits = el.value.replace(/\D/g, ''); // só números

  if (digits.length > 11) digits = digits.slice(0, 11);

  let formatted = '';

  if (digits.length > 0) {
    formatted += '(' + digits.substring(0, 2);
  }
  if (digits.length >= 3) {
    formatted += ') ' + digits.substring(2, 7);
  } else if (digits.length > 2) {
    formatted += ') ' + digits.substring(2);
  }
  if (digits.length >= 8) {
    formatted += '-' + digits.substring(7, 11);
  }

  el.value = formatted;
});

// ====== Validação + Máscara CPF ======
const cpfInput = document.getElementById('cpf');

function validarCPF(cpf) {
  cpf = cpf.replace(/[^\d]+/g, '');
  if (cpf.length !== 11) return false;
  if (/^(\d)\1{10}$/.test(cpf)) return false;

  let soma = 0;
  let resto;

  for (let i = 1; i <= 9; i++) {
    soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
  }
  resto = (soma * 10) % 11;
  if (resto === 10 || resto === 11) resto = 0;
  if (resto !== parseInt(cpf.substring(9, 10))) return false;

  soma = 0;
  for (let i = 1; i <= 10; i++) {
    soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
  }
  resto = (soma * 10) % 11;
  if (resto === 10 || resto === 11) resto = 0;
  if (resto !== parseInt(cpf.substring(10, 11))) return false;

  return true;
}

cpfInput.addEventListener('input', (e) => {
  let val = e.target.value.replace(/\D/g, '').slice(0, 11);
  let formatted = '';

  if (val.length > 0) formatted = val.substring(0, 3);
  if (val.length >= 4) formatted += '.' + val.substring(3, 6);
  if (val.length >= 7) formatted += '.' + val.substring(6, 9);
  if (val.length >= 10) formatted += '-' + val.substring(9, 11);

  e.target.value = formatted;
});

// ====== Validação Senha x Confirmar Senha ======
const formCadastro = document.querySelector('.sign-up form');
const password = document.getElementById('passwordCad');
const confirmPassword = document.getElementById('passwordConfirm');

// cria um span de erro dinamicamente (logo abaixo do campo confirmar senha)
let errorMsg = document.createElement('span');
errorMsg.id = 'errorSenha';
errorMsg.style.color = 'red';
errorMsg.style.fontSize = '14px';
errorMsg.style.display = 'none';
confirmPassword.insertAdjacentElement('afterend', errorMsg);

formCadastro.addEventListener('submit', function (event) {
  if (password.value !== confirmPassword.value) {
    event.preventDefault(); // cancela envio
    errorMsg.textContent = 'As senhas não conferem';
    errorMsg.style.display = 'block';
    confirmPassword.focus();
  } else {
    errorMsg.style.display = 'none';
  }
});

// feedback em tempo real
confirmPassword.addEventListener('input', function () {
  if (password.value !== confirmPassword.value) {
    errorMsg.textContent = 'As senhas não conferem';
    errorMsg.style.display = 'block';
  } else {
    errorMsg.style.display = 'none';
  }
});

// ====== Bloquear espaços nas senhas ======
function removerEspacos(input) {
  input.addEventListener('input', function () {
    this.value = this.value.replace(/\s/g, '');
  });
}

// Cadastro
removerEspacos(password);
removerEspacos(confirmPassword);

// Login
const emailLogin = document.getElementById('emailLogin');
const passwordLogin = document.getElementById('passwordLogin');
removerEspacos(emailLogin);
removerEspacos(passwordLogin);

// ====== Validação de sintaxe de senha ======
function validarSintaxeSenha(senha) {
  const regras = [
    { regex: /.{10,}/, mensagem: "Mínimo de 10 caracteres" },
    { regex: /[A-Z]/, mensagem: "Ao menos 1 letra maiúscula" },
    { regex: /[a-z]/, mensagem: "Ao menos 1 letra minúscula" },
    { regex: /[0-9]/, mensagem: "Ao menos 1 número" },
    { regex: /[^A-Za-z0-9]/, mensagem: "Ao menos 1 caractere especial" }
  ];

  return regras.filter(r => !r.regex.test(senha)).map(r => r.mensagem);
}

const senhaCadastro = document.getElementById("passwordCad");
const confirmarSenhaCadastro = document.getElementById("passwordConfirm");

// Span para mostrar erro de sintaxe
let erroSintaxe = document.createElement("span");
erroSintaxe.style.color = "red";
erroSintaxe.style.fontSize = "14px";
erroSintaxe.style.display = "none";
senhaCadastro.insertAdjacentElement("afterend", erroSintaxe);

// Feedback em tempo real
senhaCadastro.addEventListener("input", function () {
  const erros = validarSintaxeSenha(this.value);
  if (erros.length > 0) {
    erroSintaxe.innerHTML = "Senha inválida:<br>• " + erros.join("<br>• ");
    erroSintaxe.style.display = "block";
  } else {
    erroSintaxe.style.display = "none";
  }
});

// Validação no submit do formulário
const formCadastroSenha = document.querySelector(".sign-up form");

formCadastroSenha.addEventListener("submit", function (e) {
  const erros = validarSintaxeSenha(senhaCadastro.value);
  if (erros.length > 0) {
    e.preventDefault();
    erroSintaxe.innerHTML = "Senha inválida:<br>• " + erros.join("<br>• ");
    erroSintaxe.style.display = "block";
    senhaCadastro.focus();
  }
  else if (senhaCadastro.value !== confirmarSenhaCadastro.value) {
    e.preventDefault();
    erroSintaxe.innerHTML = "As senhas não conferem.";
    erroSintaxe.style.display = "block";
    confirmarSenhaCadastro.focus();
  }
});

function toggleSenha(id) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}