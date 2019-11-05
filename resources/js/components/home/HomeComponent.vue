<template>
    <div>
        <v-container style="margin-top: 20vh; margin-bottom: 20vh;">
            <home-profesor-component
                v-if="user_data['tipo_usuario'] == 'Profesor'"
            ></home-profesor-component>
            <home-alumno-component
                v-else
            ></home-alumno-component>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["app_name", "user_data"],
    data() {
        return {};
    },
    methods: {},
    mounted() {}
};
</script>
