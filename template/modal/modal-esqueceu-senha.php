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
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px">
          <small>Tempo restante: <span id="kk_fp_timer">03:00</span></small>
          <button id="kk_fp_resend" class="kk-btn-ghost" disabled>Reenviar</button>
        </div>

        <p style="margin-top:15px;">Defina a nova senha:</p>
        <input id="kk_fp_new" type="password" placeholder="Nova senha" autocomplete="new-password" />
        <input id="kk_fp_confirm" type="password" placeholder="Confirmar nova senha" autocomplete="new-password" />
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
      }
    }

    function showLoading() {
      loadingEl.style.display = 'block';
    }

    function hideLoading() {
      loadingEl.style.display = 'none';
    }

    function showMessage(msg) {
      alert(msg);
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
          showMessage('Informe o e-mail');
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
              showMessage(data.message);
            }
          }).catch(err => {
            hideLoading();
            showMessage('Erro na requisição');
          });

      } else if (currentStep === 2) {
        const email = document.getElementById('kk_fp_email').value.trim();
        const cel = document.getElementById('kk_fp_celular').value.trim();
        const cpf = document.getElementById('kk_fp_cpf').value.trim();
        if (!cel || !cpf) {
          showMessage('Preencha celular e CPF');
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
              showMessage('Código enviado para seu e-mail');
              gotoStep(3);
              startTimer(180);
            } else {
              showMessage(data.message);
            }
          }).catch(err => {
            hideLoading();
            showMessage('Erro na requisição');
          });

      } else if (currentStep === 3) {
        const email = document.getElementById('kk_fp_email').value.trim();
        const otp = document.getElementById('kk_fp_otp').value.trim();
        const n = document.getElementById('kk_fp_new').value.trim();
        const c = document.getElementById('kk_fp_confirm').value.trim();

        if (otp.length !== 6) {
          showMessage('Digite o código correto');
          return;
        }
        if (!n || !c) {
          showMessage('Preencha as senhas');
          return;
        }
        if (n !== c) {
          showMessage('Senhas não conferem');
          return;
        }

        showLoading();
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
              showMessage('Senha redefinida');
              closeModal();
            } else {
              showMessage(data.message);
            }
          }).catch(err => {
            hideLoading();
            showMessage('Erro na requisição');
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
            showMessage('Código reenviado');
            startTimer(180);
          } else {
            showMessage(data.message);
          }
        }).catch(err => {
          hideLoading();
          showMessage('Erro na requisição');
        });
    });
  })();
</script>