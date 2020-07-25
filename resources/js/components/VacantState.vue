<template>
    <div id="estado">
        <span class="badge badge-success"
            :class="classStateVacant()"
            @click="changeVacantStatus()"
            :key="vacantStateData"
        >
        <!-- con key="" le decimos a vue que este atento a los cambios :class clases dinamicas-->
            {{changeVacantText}}
        </span>
    </div>
</template>
<script>
    export default{
        props:['vacantState','vacantId'],
        mounted() {
            console.log(this.vacantState,'este es el id',this.vacantId);
            this.vacantStateData = Number(this.vacantState);
        },
        data() {
            return {
                vacantStateData:null
            }
        },
        methods: {
            // cambia la clases del span de la vacante
            classStateVacant(){
                return this.vacantStateData == 1 ? 'badge badge-succes' :'badge badge-dark'
            },
            // cambia el estado de la vacante de activa a inactiva y biceversa
            changeVacantStatus(){
                // console.log('cambiar estado');
                if(this.vacantStateData == 1){
                    this.vacantStateData = 0;
                    // console.log('cambio de estado ->',this.vacantStateData);
                }else{
                    this.vacantStateData = 1;
                    // console.log('cambio de estado <-', this.vacantStateData);
                }
                const params ={
                    state: this.vacantStateData
                }
                axios
                    .post('/vacants/'+ this.vacantId, params )
                        .then(respuesta => console.log('ok'))
                        .catch(error => console.log(error))
            }
        },
        // cambia el valor al dar click en elemento span no en el texto ademas el doc debe estar listo
        computed: {
            // este elemento va en vez del texto en las etiquetas
            changeVacantText (){
                return this.vacantStateData  === 1 ? 'Activa' : 'Inactiva'
            }
        },
    }

</script>
<style>
    .badge{
        font-size: 0.8rem;
        cursor: pointer;
    }
</style>
