const formulario = document.querySelector('#login');
let comprobandopass = false;
let comprobandonom = false;
let comprobandoema = false;
let comprobandoape = false;
let comprobandousu = false;

eventListeners();

function eventListeners() {

    if (comprobandoema && comprobandopass && comprobandonom && comprobandousu && comprobandoape) {
        $('#crear-registro').attr('disabled', false);
        $('#crear-registro').removeClass('isDisabled');

    } else {
        $('#crear-registro').attr('disabled', true);
        $('#crear-registro').addClass('isDisabled');
    }
}

$('#crear-registro').attr('disabled', true);
$('#password2').on('input', comprobar);
$('#password').on('input', comprobar);
$('#nombre').on('blur', validar);
$('#apellidos').on('blur', validar3);
$('#usuario').on('blur', validar2);
$('#email').on('blur', validarMail);

function comprobar() {
    var password = $('#password').val();
    var password2 = $('#password2').val();
    if (password == password2) {
        $('#resultado-password').text('');
        $('#resultado-password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password2').parents('.form-group').addClass('has-success').removeClass('has-error');
        comprobandopass = true;
    } else {
        $('#resultado-password').text('* Las contraseñas no son iguales');
        $('#resultado-password').parents('.form-group').addClass('has-error');
        $('input#password').parents('.form-group').addClass('has-error');
        $('input#password2').parents('.form-group').addClass('has-error');
        comprobandopass = false;
    }
    eventListeners();

}

function validarMail() {
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.value)) {
        errorDiv2.style.display = "block";
        errorDiv2.innerHTML = "* Escriba un E-Mail valido";
        this.style.border = "1px solid red";
        comprobandoema = false;

    } else {
        errorDiv2.style.display = "none";
        this.style.border = "1px solid #00a65a";
        comprobandoema = true;
    }
    eventListeners();

}

function validar() {
    if (this.value == "") {
        errorDiv.style.display = "block";
        errorDiv.innerHTML = "* Este campo es obligatorio";
        this.style.border = "1px solid red";
        comprobandonom = false;

    } else {
        errorDiv.style.display = "none";
        this.style.border = "1px solid #00a65a";
        comprobandonom = true;
    }
    eventListeners();

}

function validar2() {
    if (this.value == "") {
        errorDiv.style.display = "block";
        errorDiv.innerHTML = "* Este campo es obligatorio";
        this.style.border = "1px solid red";
        comprobandousu = false;

    } else {
        errorDiv.style.display = "none";
        this.style.border = "1px solid #00a65a";
        comprobandousu = true;
    }
    eventListeners();

}

function validar3() {
    if (this.value == "") {
        errorDiv.style.display = "block";
        errorDiv.innerHTML = "* Este campo es obligatorio";
        this.style.border = "1px solid red";
        comprobandoape = false;

    } else {
        errorDiv.style.display = "none";
        this.style.border = "1px solid #00a65a";
        comprobandoape = true;
    }
    eventListeners();

}


function lanzaAlerta(tipo, titulo, texto) {
    Swal.fire({
        type: tipo,
        title: titulo,
        text: texto
    });
}

