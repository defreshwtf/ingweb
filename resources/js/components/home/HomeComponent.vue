<template>
    <div>
        <v-container style="margin-top: 20vh; margin-bottom: 20vh;">
            <home-profesor-component
                v-if="tipo_usuario == 'Profesor'"
                :profesor="info_tipo_usuario"
            ></home-profesor-component>
            <home-alumno-component
                v-else-if="tipo_usuario == 'Alumno'"
                :alumno="info_tipo_usuario"
            ></home-alumno-component>
            <home-administrador-component
                v-else
                :administrador="info_tipo_usuario"
            >
            </home-administrador-component>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["app_name", "tipo_usuario", "info_tipo_usuario"],
    data() {
        return {};
    },
    methods: {},
    mounted() {}
};
</script>
