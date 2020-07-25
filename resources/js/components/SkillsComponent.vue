<template>
    <div class="flex justify-between">
        <div class="btn-group-sm">
            <div class="btn btn-outline-success p-2 mr-2 mb-2"
            :class="verificarClaseActiva(skill.name)"
             v-for="(skill, i) in this.skills" v-bind:key="i"
             @click="activar($event)">{{skill.name}}</div>
        </div>
        <!-- retornar los valores para alamacenar en bd -->
        <input type="hidden" name="habilidades" id="skills">
    </div>
</template>
<script>
    export default{
        props:['skills','oldskills'],
        mounted() {
            console.log(this.oldskills);
            document.querySelector('#skills').value = this.oldskills;
        },
        created() {
            if(this.oldskills){
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        data() {
            return {
                // Set() similares alos arreglos pero no permiten valores repetidos
                habilidades:new Set()
            }
        },
        methods: {
            activar(e){
                // verificar si el boton esta activo -> remove class else: add class
                if(e.target.classList.contains('btn-primary')){
                    e.target.classList.remove('btn-primary');
                    // eliminar valores al habilidades:Set()
                    this.habilidades.delete(e.target.textContent);

                }else{
                    e.target.classList.add('btn-primary');
                    // agregar valores al habilidades:Set()
                    this.habilidades.add(e.target.textContent);
                }
                // console.log("diste click",e.target.textContent);
                // convertir el object a string
                const stringSkills = [...this.habilidades];
                // agregar las habilidades al input:hidden
                document.querySelector('#skills').value = stringSkills;
            },
            verificarClaseActiva(skill){
                return this.habilidades.has(skill) ? 'btn-primary':'';
            }
        }
    }

</script>
