const btnAdicionarResponsavel = document.getElementById('btnAdicionarResponsavel')
const responsavelFormulario = document.getElementById('responsavelFormulario')
const responsavel = document.getElementById('responsavel-2')
const btnRemoverResponsavel = document.getElementById('btnRemoverResponsavel')


btnAdicionarResponsavel.addEventListener('click', (e) => {
    e.preventDefault();
    responsavel.style.display = 'block';

    btnAdicionarResponsavel.disabled = true;
    btnAdicionarResponsavel.style.display = 'none';
})

btnRemoverResponsavel.addEventListener('click', (e) => {
    e.preventDefault();

    if(confirm('deseja remover responsavel ?')){
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
    }

});
