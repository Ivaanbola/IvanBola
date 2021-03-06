eventListeners();

function eliminar(e) {
    var datos = new FormData();
    console.log(e.name);
    datos.append('nombreEliminar', e.name);
    datos.append('accion', 'eliminaruno');
    datos.append('tabla', 'videos');
    var xhr = new XMLHttpRequest();
    swal.fire({
        title: '¿Estas seguro/a?',
        text: 'No seras capaz de recuperar esto',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            xhr.open('POST', 'funciones/zips.php', true);
            xhr.onload = function () {
                if (this.status == 200) {
                    //var respuesta = JSON.parse(xhr.responseText);
                    var respuesta = xhr.responseText;
                    console.log(respuesta);
                    e.parentElement.parentElement.parentElement.remove();
                }
            }
            xhr.send(datos);
        }
    })
}

function eventListeners() {
    Dropzone.options.myAwesomeDropzone = {
        autoProcessQueue: false,
        addRemoveLinks: true,
        acceptedFiles: "video/*",
        dictDefaultMessage: "Arrastra aqui los elementos: </br>Formatos admitidos .avi .mp4 .mov .mpeg",
        dictInvalidFileType: "Este tipo de archivos no estan admitidos",
        dictCancelUpload: "Cancelar",
        maxFilesize: 20000,
        parallelUploads: 200,
        init: function () {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                $(".iframe").colorbox({iframe: true, width: "90%", height: "60%"});
            } else
                $(".iframe").colorbox({iframe: true, width: "60%", height: "80%"});
            var boton = document.querySelector('#enviar-todo');
            var botonDescarga = document.querySelector('#descargar-todo');
            var botonSelec = document.querySelector('#limpiar-selec');
            var botonLimpiar = document.querySelector('#limpiar-todo');
            var basuraca = document.querySelector('#basuraca');
            var self = this;
            self.options.dictRemoveFile = "Eliminar";

            boton.addEventListener('click', function () {
                self.getQueuedFiles().forEach(function (element) {
                    self.processFile(element);
                });
            });

            let chequear = document.querySelector('#chequear');
            chequear.addEventListener('change', function () {
                let checkboxes = document.getElementsByName('registro[]');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                }
            });
            this.on("addedfile", function (file) {
                boton.classList.remove('isDisabled');
                botonLimpiar.classList.remove('isDisabled');
            });
            this.on("success", function (file, responseText) {
                // Handle the responseText here. For example, add the text to the preview element:
                //file.previewTemplate.appendChild(document.createTextNode(responseText));
                boton.className += ' isDisabled';
                botonLimpiar.className += ' isDisabled';
                botonDescarga.classList.remove('isDisabled');
                botonDescarga.disabled = false;
                botonSelec.classList.remove('isDisabled');
                botonSelec.disabled = false;
                crearElementos(file);
                paravideo();
                setTimeout(() => {
                    self.removeFile(file);
                }, 3500);
            });

            function paravideo() {
                $(".iframe").colorbox({iframe: true, width: "60%", height: "80%"});
            }


            var botonLimpiar = document.querySelector('#limpiar-todo');
            botonLimpiar.addEventListener('click', function () {
                self.removeAllFiles();
            });

            botonDescarga.addEventListener('click', function () {
                let checkboxes = document.getElementsByName('registro[]');
                setTimeout(function () {
                    for (var i = checkboxes.length - 1; 0 <= i; i--) {
                        if (checkboxes[i].checked) {
                            checkboxes[i].parentElement.parentElement.parentElement.remove();
                        }
                    }
                }, 7000)

            });

            botonSelec.addEventListener('click', function () {
                swal.fire({
                    title: '¿Estas seguro/a?',
                    text: 'No seras capaz de recuperar esto',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {
                        let checkboxes = document.getElementsByName('registro[]');
                        let miarray = Array();
                        for (var i = checkboxes.length - 1; 0 <= i; i--) {
                            if (checkboxes[i].checked) {
                                miarray.push(checkboxes[i].value);
                                checkboxes[i].parentElement.parentElement.parentElement.remove();
                            }
                        }
                        var datos = new FormData();
                        datos.append('registro[]', miarray);
                        datos.append('accion', 'eliminar');
                        datos.append('tabla', 'videos');
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'funciones/zips.php', true);
                        xhr.onload = function () {
                            if (this.status == 200) {
                                //var respuesta = JSON.parse(xhr.responseText);
                                var respuesta = xhr.responseText;
                                console.log(respuesta);
                            }
                        }
                        xhr.send(datos);
                    }
                })

            });


            function crearElementos(file) {
                var imagenbasura = document.createElement('img');
                imagenbasura.setAttribute('src', "img/iconotrash.svg");
                imagenbasura.setAttribute('class', "descarga");
                var enlaceBasura = document.createElement('a');
                enlaceBasura.appendChild(imagenbasura);
                enlaceBasura.setAttribute('onclick', "eliminar(this)");
                enlaceBasura.setAttribute('id', "basuraca");
                enlaceBasura.setAttribute('name', file.name);
                var imagendesc = document.createElement('img');
                imagendesc.setAttribute('src', "img/iconodesc.svg");
                imagendesc.setAttribute('class', "descarga");
                var enlaceDescarga = document.createElement('a');
                enlaceDescarga.setAttribute('href', "videosSubidos/" + file.name);
                enlaceDescarga.appendChild(imagendesc);
                enlaceDescarga.download = file.name;
                var colorBox = document.createElement('video');
                colorBox.setAttribute('src', "videosSubidos/" + file.name);
                colorBox.setAttribute('alt', 'video');
                var enlaceColorbox = document.createElement('a');
                enlaceColorbox.setAttribute('class', 'iframe cboxElement');
                enlaceColorbox.setAttribute('href', "videosSubidos/" + file.name);
                enlaceColorbox.appendChild(colorBox);
                var cajaiconos = document.createElement('div');
                var div1 = document.createElement('div');
                var div2 = document.createElement('div');
                var div3 = document.createElement('div');
                var checkbox = document.createElement('input');
                checkbox.type = "checkbox";
                checkbox.value = file.name;
                checkbox.name = 'registro[]';
                div1.appendChild(checkbox);
                div2.appendChild(enlaceDescarga);
                div3.appendChild(enlaceBasura);
                cajaiconos.setAttribute('class', 'iconos grid-fuera');
                cajaiconos.appendChild(div1);
                cajaiconos.appendChild(div2);
                cajaiconos.appendChild(div3);

                var cajavista = document.createElement('div');
                cajavista.setAttribute('class', 'vista-imagen');
                cajavista.appendChild(enlaceColorbox);
                cajavista.appendChild(cajaiconos);
                var contenedor = document.querySelector('#vista');
                contenedor.appendChild(cajavista);
            }

        }
    };
}

