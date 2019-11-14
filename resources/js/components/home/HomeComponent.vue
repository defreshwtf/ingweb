<template>
    <div>
        <v-container style="margin-top: 20vh; margin-bottom: 20vh;">
            <home-profesor-component
                v-if="tipo_usuario == 'Profesor'"
                :id_profesor="id_tipo_usuario"
            ></home-profesor-component>
            <home-alumno-component
                v-else
                :info_profesores_by_materia="info_profesores_by_materia"
                :id_alumno="id_tipo_usuario"
            ></home-alumno-component>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["app_name", "tipo_usuario", "id_tipo_usuario","info_profesores_by_materia"],
    data() {
        return {};
    },
    methods: {},
    mounted() {}
};
</script>
