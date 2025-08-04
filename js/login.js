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
