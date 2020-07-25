<template>
    <div class="">
        <a class="text-decoration-none text-danger mr-2"
            @click="deleteVacant">
            <i class="btn btn-outline-danger far fa-trash-alt"></i>
    </a>
    </div>
</template>
<script>
    export default{
        props:['vacantId'],
        methods: {
            deleteVacant: function(){
                this.$swal.fire({
                    title: 'Estas seguro de Elminar la vacante?',
                    text: "¡Una vez eliminada no de podra recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText:'No'
                }).then((result) => {
                    if (result.value) {
                        // Enviar peticion a axios para eliminar
                        const params = {
                            vacantId : this.vacantId,
                            _method :'delete'
                        }
                        axios
                        .post(`/vacants/${this.vacantId}`,params)
                            .then(respuesta => {
                                // console.log(respuesta);
                                this.$swal.fire(
                                    'Vacante Eliminada!',
                                    respuesta.data.message,
                                    'success'
                                )
                                // una vez eliminada de la bd aliminar del DOm
                                this.$el.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode)
                            }).catch(error => {

                        })
                    }
                })
            }
        },

    }
</script>
