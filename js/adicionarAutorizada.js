const btnAdicionarAutorizada = document.getElementById('btnAdicionarAutorizada')
const btnRemoverAutorizada = document.getElementById('btnRemoverAutorizada')
const autorizada_2 = document.getElementById('autorizada-2')

// Adicionar autorizada
btnAdicionarAutorizada.addEventListener('click', (e) => {
    e.preventDefault();
    autorizada_2.style.display = 'block'
    btnAdicionarAutorizada.disabled = true
    btnAdicionarAutorizada.style.display = 'none'
})

// Abrir modal ao clicar em remover
btnRemoverAutorizada.addEventListener('click', (e) => {
    e.preventDefault();
    $('#modalRemoverAutorizada').modal('show')
})

// Confirmar remoção
$('#confirmarRemocao').on('click', function () {
    autorizada_2.style.display = 'none'

    // limpa os campos
    const inputs = autorizada_2.querySelectorAll('input, select');
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = false
        } else {
            input.value = ''
        }
    });

    btnAdicionarAutorizada.disabled = false
    btnAdicionarAutorizada.style.display = 'inline-block'
})
