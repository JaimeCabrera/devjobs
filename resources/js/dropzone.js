const { default: Axios } = require("axios");

Dropzone.autoDiscover = false;
document.addEventListener('DOMContentLoaded', () => {

    const dropzoneImgVacante = new Dropzone('#dropzoneImgVacante',{
        url: "/dropzone/store",
        dictDefaultMessage: 'Click o Arrastra tu imagen ',
        acceptedFiles: '.png, .jpg, .jpeg, .gif, .bmp',
        addRemoveLinks: true,
        dicRemoveFile: 'Eliminar Archivo',
        maxFiles: 1,
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
        },
        init: function () {
            if (document.querySelector('#imagen').value.trim()) {
                let imagenPublicada = {};
                imagenPublicada.size = 9999;
                imagenPublicada.name = document.querySelector('#imagen').value;
                // agragar la imagen al fallar la valicacion a dropzone
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/storage/vacants/${imagenPublicada.name}`);
                imagenPublicada.previewElement.classList.add('dz-success');
                imagenPublicada.previewElement.classList.add('dz-complete');
            }
        },
        // evento que se activa al subir la imagen toma dos parametros file, response
        success: function (file, response) {
            // console.log(response);
            document.querySelector('#errorImg').textContent = '';
            // colocar la respuesta del servidor en input:hidden
            document.querySelector('#imagen').value = response.correcto;
            // añadir al objeto de archivo el nombre que viene del servidor
            file.nombreImgServer = response.correcto;
        },
        maxfilesexceeded: function (file) {
            if (this.files[1] != null) {
                this.removeFile(this.files[0]); //Elimina el archivo anterior
                this.addFile(file);
            }
        },
        removedfile: function (file, response) {
            // console.log(response);
            file.previewElement.parentNode.removeChild(file.previewElement);
            params: {
                imagen: file.nombreImgServer ?? document.querySelector('#imagen').value
            }
            axios.post('/dropzone/delete', params)
                .then(respuesta => console.log(respuesta));
        }
    });
});
