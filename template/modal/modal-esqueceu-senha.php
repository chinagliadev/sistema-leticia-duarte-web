<style>
  #kk-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    padding: 20px;
  }

  #kk-modal {
    width: 100%;
    max-width: 520px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
    overflow: visible;
  }

  #kk-modal .kk-modal-header {
    padding: 14px 18px;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    background: #1C86CC;
    color: #fff;
    font-weight: 700;
    font-size: 18px;
  }

  #kk-modal .kk-modal-body {
    padding: 18px;
    color: #222;
  }

  #kk-modal .kk-modal-footer {
    padding: 12px 18px 18px;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    align-items: center;
  }

  #kk-modal input[type="email"],
  #kk-modal input[type="text"],
  #kk-modal input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
  }

  .kk-btn-primary {
    background: #1C86CC;
    color: #fff;
    border: none;
    padding: 10px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 700;
  }

  .kk-btn-ghost {
    background: transparent;
    color: #333;
    border: 1px solid #ddd;
    padding: 10px 14px;
    border-radius: 8px;
    cursor: pointer;
  }

  .swal2-container {
    z-index: 1000000 !important;
  }

  @media (max-width:480px) {
    #kk-modal {
      max-width: 95%;
    }
  }
</style>

<div id="kk-modal-backdrop" aria-hidden="true">
  <div id="kk-modal" role="dialog" aria-labelledby="kk-modal-title" aria-modal="true">
    <div class="kk-modal-header" id="kk-modal-title">Recuperar senha</div>

    <div class="kk-modal-body">
      <!-- Step 1: Apenas E-mail -->
      <div id="kk-step-1">
        <p>Informe seu e-mail cadastrado:</p>
        <label>E-mail</label>
        <input id="kk_fp_email" type="email" placeholder="exemplo@dominio.com" autocomplete="off" />
      </div>

      <!-- Step 2: Celular + CPF -->
      <div id="kk-step-2" style="display:none">
        <p>Confirme seu celular e CPF:</p>
        <label>Celular</label>
        <input id="kk_fp_celular" type="text" placeholder="(xx) xxxxx-xxxx" autocomplete="off" />
        <label>CPF</label>
        <input id="kk_fp_cpf" type="text" placeholder="000.000.000-00" autocomplete="off" />
      </div>

      <!-- Step 3: Código + redefinir senha -->
      <div id="kk-step-3" style="display:none">
        <p>Insira o código de 6 dígitos enviado por e-mail:</p>
        <input id="kk_fp_otp" type="text" maxlength="6" placeholder="000000" autocomplete="off" />
        <p>(Caso a mensagem com o código não apareça no seu e-mail verifique sua caixa de spam)</p>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px">
          <small>Tempo restante: <span id="kk_fp_timer">03:00</span></small>
          <button id="kk_fp_resend" class="kk-btn-ghost" disabled>Reenviar</button>
        </div>

        <p style="margin-top:15px;">Defina a nova senha:</p>

        <label for="kk_fp_new" class="password">Nova senha</label>
        <div class="password-wrapper">
          <input type="password" id="kk_fp_new" placeholder="Nova senha" autocomplete="new-password">
          <i class="bi bi-eye-slash toggle-password" data-target="#kk_fp_new"></i>
        </div>

        <label for="kk_fp_confirm" class="password">Confirmar nova senha</label>
        <div class="password-wrapper">
          <input type="password" id="kk_fp_confirm" placeholder="Confirmar nova senha" autocomplete="new-password">
          <i class="bi bi-eye-slash toggle-password" data-target="#kk_fp_confirm"></i>
        </div>
      </div>
    </div>

    <div class="kk-modal-footer">
      <button id="kk_fp_close" class="kk-btn-ghost">Cancelar</button>
      <button id="kk_fp_next" class="kk-btn-primary">Próximo</button>
    </div>
  </div>
</div>

<script>
  (function() {
    const backdrop = document.getElementById('kk-modal-backdrop');
    const modal = document.getElementById('kk-modal');
    const btnClose = document.getElementById('kk_fp_close');
    const btnNext = document.getElementById('kk_fp_next');
    const btnResend = document.getElementById('kk_fp_resend');

    const step1 = document.getElementById('kk-step-1');
    const step2 = document.getElementById('kk-step-2');
    const step3 = document.getElementById('kk-step-3');

    const timerEl = document.getElementById('kk_fp_timer');
    let currentStep = 1;
    let timerInterval = null;
    let expiresAt = null;

    const loadingEl = document.createElement('div');
    loadingEl.textContent = 'Aguarde...';
    loadingEl.style.cssText = 'position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);background:#fff;padding:12px 20px;border-radius:8px;box-shadow:0 4px 15px rgba(0,0,0,0.3);display:none;z-index:100000;';
    document.body.appendChild(loadingEl);

    function openModal() {
      backdrop.style.display = 'flex';
      gotoStep(1);
    }

    function closeModal() {
      backdrop.style.display = 'none';
      clearInterval(timerInterval);

      document.getElementById('kk_fp_email').value = '';
      document.getElementById('kk_fp_celular').value = '';
      document.getElementById('kk_fp_cpf').value = '';
      document.getElementById('kk_fp_otp').value = '';
      document.getElementById('kk_fp_new').value = '';
      document.getElementById('kk_fp_confirm').value = '';

      timerEl.textContent = '03:00';
      gotoStep(1);
    }

    function gotoStep(n) {
      currentStep = n;
      step1.style.display = (n === 1 ? 'block' : 'none');
      step2.style.display = (n === 2 ? 'block' : 'none');
      step3.style.display = (n === 3 ? 'block' : 'none');
      btnNext.textContent = (n === 1 ? 'Próximo' : n === 2 ? 'Enviar código' : 'Redefinir senha');
      btnResend.disabled = (n !== 3);
    }

    function startTimer(seconds) {
      clearInterval(timerInterval);
      expiresAt = Date.now() + seconds * 1000;
      btnResend.disabled = true;
      updateTimer();
      timerInterval = setInterval(updateTimer, 500);
    }

    function updateTimer() {
      const diff = Math.max(0, expiresAt - Date.now());
      const mm = String(Math.floor(diff / 60000)).padStart(2, '0');
      const ss = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
      timerEl.textContent = mm + ':' + ss;

      if (diff <= 0) {
        clearInterval(timerInterval);
        btnResend.disabled = false;
        timerEl.textContent = '00:00';
        btnResend.style.opacity = '1';
        btnResend.style.cursor = 'pointer';
        btnResend.textContent = 'Reenviar código';
      } else {
        btnResend.disabled = true;
        btnResend.style.opacity = '0.6';
        btnResend.style.cursor = 'not-allowed';
        btnResend.textContent = 'Aguardando...';
      }
    }

    function showLoading() {
      loadingEl.style.display = 'block';
    }

    function hideLoading() {
      loadingEl.style.display = 'none';
    }

    btnClose.addEventListener('click', closeModal);
    document.addEventListener('click', e => {
      const el = e.target;
      if (el.matches('.checkPassword a') || el.closest('.checkPassword a')) {
        e.preventDefault();
        openModal();
      }
    });

    btnNext.addEventListener('click', function() {
      if (currentStep === 1) {
        const email = document.getElementById('kk_fp_email').value.trim();
        if (!email) {
          Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: 'Informe um e-mail!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }

        showLoading();
        fetch('auth.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `acao=check_email&email=${encodeURIComponent(email)}`
          })
          .then(res => res.json())
          .then(data => {
            hideLoading();
            if (data.success) {
              gotoStep(2);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'E-mail não encontrado',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1C86CC'
              });
            }
          })
          .catch(() => {
            hideLoading();
            Swal.fire({
              icon: 'error',
              title: 'Erro',
              text: 'Erro na requisição.',
              confirmButtonText: 'OK',
              confirmButtonColor: '#1C86CC'
            });
          });

      } else if (currentStep === 2) {
        const email = document.getElementById('kk_fp_email').value.trim();
        const cel = document.getElementById('kk_fp_celular').value.trim();
        const cpf = document.getElementById('kk_fp_cpf').value.trim();
        if (!cel || !cpf) {
          Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: 'Informe o Celular e CPF!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }

        showLoading();
        fetch('auth.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `acao=check_cel_cpf&email=${encodeURIComponent(email)}&celular=${encodeURIComponent(cel)}&cpf=${encodeURIComponent(cpf)}`
          })
          .then(res => res.json())
          .then(data => {
            hideLoading();
            if (data.success) {
              Swal.fire({
                icon: 'success',
                title: 'Código enviado!',
                text: 'O código foi enviado para seu e-mail.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1C86CC'
              }).then(() => {
                gotoStep(3);
                startTimer(180);
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Celular ou CPF incorretos.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1C86CC'
              });
            }
          })
          .catch(() => {
            hideLoading();
            Swal.fire({
              icon: 'error',
              title: 'Erro',
              text: 'Erro na requisição.',
              confirmButtonText: 'OK',
              confirmButtonColor: '#1C86CC'
            });
          });

      } else if (currentStep === 3) {
        const email = document.getElementById('kk_fp_email').value.trim();
        const otp = document.getElementById('kk_fp_otp').value.trim();
        const n = document.getElementById('kk_fp_new').value.trim();
        const c = document.getElementById('kk_fp_confirm').value.trim();

        if (expiresAt && Date.now() > expiresAt) {
          Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'O tempo para usar este código expirou. Clique em "Reenviar código" para obter um novo.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }

        if (otp.length !== 6) {
          Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Código incorreto!',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }
        if (!n || !c) {
          Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: 'Informe e confirme sua nova senha',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }
        if (n !== c) {
          Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'As senhas não coincidem',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
          return;
        }

        showLoading();
        fetch('auth.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `acao=verify_otp&email=${encodeURIComponent(email)}&codigo=${encodeURIComponent(otp)}`
          })
          .then(res => res.json())
          .then(data => {
            if (!data.success) {
              hideLoading();
              Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Código incorreto ou expirado!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1C86CC'
              });
              return;
            }

            fetch('auth.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `acao=reset_password&email=${encodeURIComponent(email)}&nova_senha=${encodeURIComponent(n)}&confirmar=${encodeURIComponent(c)}&codigo=${encodeURIComponent(otp)}`
              })
              .then(res => res.json())
              .then(data => {
                hideLoading();
                if (data.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Senha redefinida!',
                    text: 'Sua senha foi alterada com sucesso.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#1C86CC'
                  }).then(() => closeModal());
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Erro ao redefinir senha.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#1C86CC'
                  });
                }
              })
              .catch(() => {
                hideLoading();
                Swal.fire({
                  icon: 'error',
                  title: 'Erro',
                  text: 'Erro na requisição.',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#1C86CC'
                });
              });
          })
          .catch(() => {
            hideLoading();
            Swal.fire({
              icon: 'error',
              title: 'Erro',
              text: 'Erro ao validar o código.',
              confirmButtonText: 'OK',
              confirmButtonColor: '#1C86CC'
            });
          });
      }
    });

    btnResend.addEventListener('click', function() {
      const email = document.getElementById('kk_fp_email').value.trim();
      const cel = document.getElementById('kk_fp_celular').value.trim();
      const cpf = document.getElementById('kk_fp_cpf').value.trim();

      showLoading();
      fetch('auth.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `acao=check_cel_cpf&email=${encodeURIComponent(email)}&celular=${encodeURIComponent(cel)}&cpf=${encodeURIComponent(cpf)}`
        })
        .then(res => res.json())
        .then(data => {
          hideLoading();
          if (data.success) {
            Swal.fire({
              icon: 'success',
              title: 'Código reenviado!',
              text: 'Um novo código foi enviado para seu e-mail.',
              confirmButtonText: 'OK',
              confirmButtonColor: '#1C86CC'
            }).then(() => startTimer(180));
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Erro',
              text: 'Erro ao reenviar o código.',
              confirmButtonText: 'OK',
              confirmButtonColor: '#1C86CC'
            });
          }
        })
        .catch(() => {
          hideLoading();
          Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Erro na requisição.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#1C86CC'
          });
        });
    });

    function formatCPF(value) {
      value = value.replace(/\D/g, '');

      if (value.length > 11) {
        value = value.slice(0, 11);
      }

      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

      return value;
    }

    function formatCelular(value) {
      value = value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      if (value.length <= 10) {
        return value.replace(/^(\d{2})(\d)/g, '($1) $2').replace(/(\d{4})(\d{1,4})$/, '$1-$2');
      } else {
        return value.replace(/^(\d{2})(\d)/g, '($1) $2').replace(/(\d{5})(\d{1,4})$/, '$1-$2');
      }
    }

    const inputCPF = document.getElementById('kk_fp_cpf');
    const inputCelular = document.getElementById('kk_fp_celular');
    inputCPF.addEventListener('input', e => e.target.value = formatCPF(e.target.value));
    inputCelular.addEventListener('input', e => e.target.value = formatCelular(e.target.value));

    function validarSintaxeEsqueceuSenha(senha) {
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

    const novaSenha = document.getElementById('kk_fp_new');
    const confirmarSenha = document.getElementById('kk_fp_confirm');

    const msgErroNova = document.createElement('span');
    msgErroNova.style = 'color:red;font-size:14px;display:none;';
    novaSenha.insertAdjacentElement('afterend', msgErroNova);

    const msgErroConfirmar = document.createElement('span');
    msgErroConfirmar.style = 'color:red;font-size:14px;display:none;';
    confirmarSenha.insertAdjacentElement('afterend', msgErroConfirmar);

    function mostrarErro(span, msg) {
      span.innerHTML = msg;
      span.style.display = 'block';
    }

    function esconderErro(span) {
      span.style.display = 'none';
    }

    function validarCamposEsqueceuSenha() {
      const senha = novaSenha.value;
      const confirmar = confirmarSenha.value;

      const erros = validarSintaxeEsqueceuSenha(senha);
      if (erros.length > 0) {
        mostrarErro(msgErroNova, "Senha inválida:<br>• " + erros.join("<br>• "));
      } else {
        esconderErro(msgErroNova);
      }
    }

    novaSenha.addEventListener('input', validarCamposEsqueceuSenha);
    confirmarSenha.addEventListener('input', validarCamposEsqueceuSenha);

    const inputOTP = document.getElementById('kk_fp_otp');
    inputOTP.addEventListener('input', e => {
      e.target.value = e.target.value
        .replace(/\D/g, '')
        .slice(0, 6);
    });
  })();
</script>