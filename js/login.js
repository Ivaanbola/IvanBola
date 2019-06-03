
eventListeners();

function eventListeners() {
    const formulario = document.querySelector('#login');
    console.log(formulario);

    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        console.log("eeeeeeeee"+formulario);

        const usuario = document.querySelector('#usuario').value,
            password = document.querySelector('#password').value;

        if (usuario == '' || password == '') {
            //Validacion fallida
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Ambos campos son obligatorios'
            });
        } else {
            formulario.submit();
        }
    })


}
function lanzaAlerta(tipo, titulo, texto) {
    Swal.fire({
        type: tipo,
        title: titulo,
        text: texto
    });
}


