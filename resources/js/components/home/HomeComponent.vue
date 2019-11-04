<template>
    <div>
        <home-profesor-component
            v-if="user_data['tipo_usuario'] == 'Profesor'"
        ></home-profesor-component>
        <home-alumno-component
            v-else
        ></home-alumno-component>
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
