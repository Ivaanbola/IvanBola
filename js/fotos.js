eventListeners();

function eventListeners() {
	 Dropzone.options.myAwesomeDropzone = {
		  autoProcessQueue: false,
		  addRemoveLinks: true,
		  acceptedFiles: ".png,.jpg,.gif,.jpeg",
		  dictDefaultMessage: "Formatos admitidos .png .jpg .jpge .gif",
		  dictInvalidFileType: "Este tipo de archivos no estan admitidos",
		  init: function () {
				var boton = document.querySelector('#enviar-todo');
				var self = this;
				self.options.dictRemoveFile = "Eliminar";

				boton.addEventListener('click', function () {
					 self.processQueue();

				});
				this.on("addedfile", function (file) {
					 // Capture the Dropzone instance as closure.
					 this.on("success", function (file, responseText) {
						  // Handle the responseText here. For example, add the text to the preview element:
						  file.previewTemplate.appendChild(document.createTextNode(responseText));
						  self.processQueue();
						  setTimeout(() => {
								self.removeFile(file);
						  }, 3500);
					 });

				});

				var botonLimpiar = document.querySelector('#limpiar-todo');
				botonLimpiar.addEventListener('click', function () {
					 self.removeAllFiles();
				});

		  }
	 };
}

