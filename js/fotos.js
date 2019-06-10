eventListeners();

function eventListeners() {
    Dropzone.options.myAwesomeDropzone = {
        autoProcessQueue: false,
        addRemoveLinks: true,
        acceptedFiles: ".png,.jpg,.gif,.jpeg",
        dictDefaultMessage: "Arrastra aqui los elementos: </br> Formatos admitidos .png .jpg .jpge .gif",
        dictInvalidFileType: "Este tipo de archivos no estan admitidos",
        dictCancelUpload: "Cancelar",
        parallelUploads: 200,
        init:

            function () {
                $(".group1").colorbox({rel: 'group1', maxWidth: "700px", maxHeight: "700px", current: "",});

                var boton = document.querySelector('#enviar-todo');
                var botonDescarga = document.querySelector('#descargar-todo');
                var botonSelec = document.querySelector('#limpiar-selec');
                var botonLimpiar = document.querySelector('#limpiar-todo');
                var basuraca = document.querySelector('#basuraca');
                var descargaca = document.querySelector('#descargaca');
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
                    //file.previewTemplate.appendChild(document.createTextNode(responseText));
                    boton.className += ' isDisabled';
                    botonLimpiar.className += ' isDisabled';
                    botonDescarga.classList.remove('isDisabled');
                    botonDescarga.disabled = false;
                    botonSelec.classList.remove('isDisabled');
                    botonSelec.disabled = false;
                    crearElementos(file);
                    parafoto();
                    setTimeout(() => {
                        self.removeFile(file);
                    }, 3500);
                    chequear.addEventListener('change', function () {
                        let checkboxes = document.getElementsByName('registro[]');
                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].checked = this.checked;
                        }
                    });
                });

                function parafoto() {
                    $(".group1").colorbox({rel: 'group1', maxWidth: "700px", maxHeight: "700px", current: "",});
                }
                botonLimpiar.addEventListener('click', function () {
                    self.removeAllFiles();
                    boton.className += ' isDisabled';
                });


                botonDescarga.addEventListener('click', function () {
                    let checkboxes = document.getElementsByName('registro[]');
                    setTimeout(function () {
                        for (var i = checkboxes.length - 1; 0 <= i; i--) {
                            if (checkboxes[i].checked) {
                                checkboxes[i].parentElement.parentElement.parentElement.remove();
                            }
                        }
                    }, 4000)

                });
                botonSelec.addEventListener('click', function () {
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
                });

                basuraca.addEventListener('click', function () {
                    var datos = new FormData();
                    datos.append('registro[]', miarray);
                    datos.append('accion', 'eliminar');
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
                });

                function crearElementos(file) {
                    var imagenbasura = document.createElement('img');
                    imagenbasura.setAttribute('src', "img/iconotrash.svg");
                    imagenbasura.setAttribute('class', "descarga");
                    var enlaceBasura = document.createElement('a');
                    enlaceBasura.setAttribute('href', "fotosSubidas/" + file.name);
                    enlaceBasura.appendChild(imagenbasura);
                    var imagendesc = document.createElement('img');
                    imagendesc.setAttribute('src', "img/iconodesc.svg");
                    imagendesc.setAttribute('class', "descarga");
                    var enlaceDescarga = document.createElement('a');
                    enlaceDescarga.setAttribute('href', "fotosSubidas/" + file.name);
                    enlaceDescarga.appendChild(imagendesc);
                    enlaceDescarga.download = file.name;
                    var colorBox = document.createElement('img');
                    colorBox.setAttribute('src', "fotosSubidas/" + file.name);
                    colorBox.setAttribute('alt', 'imagenColorbox');
                    var enlaceColorbox = document.createElement('a');
                    enlaceColorbox.setAttribute('class', 'group1 cboxElement');
                    enlaceColorbox.setAttribute('href', "fotosSubidas/" + file.name);
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
    }


}

