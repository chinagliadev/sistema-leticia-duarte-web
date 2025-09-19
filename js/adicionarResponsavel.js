const btnAdicionarResponsavel = document.getElementById('btnAdicionarResponsavel');
const responsavel = document.getElementById('responsavel-2');
const btnRemoverResponsavel = document.getElementById('btnRemoverResponsavel');
const modalRemoverResponsavel = $('#modalRemoverResponsavel'); // Modal do Semantic UI
const confirmarRemocaoResponsavel = $('#confirmarRemocaoResponsavel');

btnAdicionarResponsavel.addEventListener('click', (e) => {
    e.preventDefault();
    responsavel.style.display = 'block';

    btnAdicionarResponsavel.disabled = true;
    btnAdicionarResponsavel.style.display = 'none';
});

btnRemoverResponsavel.addEventListener('click', (e) => {
    e.preventDefault();
    modalRemoverResponsavel.modal({
        centered: true
    }).modal('show');
});

confirmarRemocaoResponsavel.on('click', () => {
    responsavel.style.display = 'none';

    const inputs = responsavel.querySelectorAll('input, select');
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = false;
        } else {
            input.value = '';
        }
    });

    btnAdicionarResponsavel.disabled = false;
    btnAdicionarResponsavel.style.display = 'inline-block';

    modalRemoverResponsavel.modal('hide');
});


