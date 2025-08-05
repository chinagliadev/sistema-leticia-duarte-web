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