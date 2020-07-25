document.addEventListener('DOMContentLoaded', () => {

        const editor = new MediumEditor('.editable', {
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                    'justifyRight', 'justifyCenter', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'],
                static: true,
                sticky: true,
                text:'Escriba la descripcion de la vacante'
            }
        });

        // agregamos al input:hidden el valor del div de medium-edditor
        editor.subscribe('editableInput', function (eventObj, editable) {
            const contenidoDescription = editor.getContent();
            document.querySelector('#description').value = contenidoDescription;
        });
        // al fallar la validacion agregamos el valor de input:hidden al div#medium-editor
    editor.setContent(document.querySelector('#description').value);

});
