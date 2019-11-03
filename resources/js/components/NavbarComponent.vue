<template>
    <div>
        <v-app-bar fixed :hide-on-scroll="true">
            <v-toolbar-title>
                <v-btn text :href="route_index">{{app_name}}</v-btn>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <v-toolbar-items v-if="auth_username != ''">
                <v-btn text :href="route_home">Home</v-btn>
                <v-btn text @click="cerrarSesion">Logout</v-btn>
            </v-toolbar-items>
            <v-toolbar-items v-else>
                <v-btn text :href="route_login">Login</v-btn>
                <v-btn text :href="route_register">Register</v-btn>
            </v-toolbar-items>
        </v-app-bar>
    </div>
</template>

<script>
export default {
    props: [
        "app_name",
        "route_index",
        "route_home",
        "route_login",
        "route_logout",
        "route_register",
        "auth_username",
    ],
    data() {
        return {};
    },
    methods: {
        cerrarSesion(){
            axios.post(this.route_logout).
                then(response =>{
                    window.location.href = this.route_index;
                });
        },
    },
};
</script>