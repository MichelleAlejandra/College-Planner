<template>

    <button type="submit" class="btn btn-icon btn-sm  m-2" style="background-color: #ff1038" @click="eliminarMateria"
        value="Eliminar X">

    </button>

</template>
<script>
export default {
    data() {
        return {
        }
    },
    props: ['horarioId'],
    methods: {
        eliminarMateria() {
            this.$swal({
                title: '¿Deseas eliminar esta materia?',
                text: "Si eliminas este materia no se podra recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {
                    const params = {
                        id: this.materia_id
                    }
                    //enviar peticion al servidor
                    axios.post(`/materias/${this.materia_id}`, { params, _method: 'delete' })
                        .then(respuesta => {
                            //ELIMINAR DEL DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error)
                        })
                    this.$swal({
                        title: 'Materia eliminada',
                        text: 'Se elimino la materia',
                        icon: 'success'
                    })
                }
            })
        }
    }
}
</script>
