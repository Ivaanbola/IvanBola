eventListeners();

function eventListeners() {
    Dropzone.options.myAwesomeDropzone = {
        autoProcessQueue: false,
        addRemoveLinks: true,
        acceptedFiles: ".png,.jpg,.gif,.jpeg",
        dictDefaultMessage: "Formatos admitidos .png .jpg .jpge .gif",
        dictInvalidFileType: "Este tipo de archivos no estan admitidos",
        parallelUploads: 200,
        init:

            function () {
                var boton = document.querySelector('#enviar-todo');
                var self = this;
                self.options.dictRemoveFile = "Eliminar";
                boton.addEventListener('click', function () {
                    self.getQueuedFiles().forEach(function (element) {
                        self.processFile(element);
                    });
                });

                this.on("success", function (file, responseText) {
                    // Handle the responseText here. For example, add the text to the preview element:
                    //file.previewTemplate.appendChild(document.createTextNode(responseText));
                    var enlaceDescarga = document.createElement('a');
                    enlaceDescarga.setAttribute('href', "fotosSubidas/" + file.name);
                    var texto = document.createTextNode('descargar');
                    enlaceDescarga.appendChild(texto);
                    enlaceDescarga.download = file.name;
                    var colorBox = document.createElement('img');
                    colorBox.setAttribute('src', "fotosSubidas/" + file.name);
                    colorBox.setAttribute('alt', 'imagenColorbox');
                    var enlaceColorbox = document.createElement('a');
                    enlaceColorbox.setAttribute('class', 'group1 cboxElement');
                    enlaceColorbox.setAttribute('href', "fotosSubidas/" + file.name);
                    enlaceColorbox.appendChild(colorBox);
                    var contenedorColorbox = document.querySelector('.vista-imagen');
                    contenedorColorbox.appendChild(enlaceColorbox);
                    contenedorColorbox.appendChild(enlaceDescarga);
                    console.log(contenedorColorbox);
                    parafoto();
                    setTimeout(() => {
                        self.removeFile(file);
                    }, 3500);
                });

                function parafoto() {
                    $(".group1").colorbox({rel: 'group1', maxWidth: "500px", maxheight: "500px", current: "",});
                }


                var botonLimpiar = document.querySelector('#limpiar-todo');
                botonLimpiar.addEventListener('click', function () {
                    self.removeAllFiles();
                });

            }
    }

}

