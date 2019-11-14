<template>
    <div>
        <v-row justify="center">
            <v-col md="6">
                <v-card style="margin: 20vh 0;">
                    <v-card-title>Login</v-card-title>
                    <v-card-text>
                        <v-form
                            ref="form"
                            @submit.prevent="validate"
                            @click.native="verifica_errores_autenticacion"
                        >
                            <v-row justify="center">
                                <v-col md="8">
                                    <v-text-field
                                        label="email"
                                        v-model="email"
                                        :rules="[rules.requerid, rules.email, rules.auth_error]"
                                    ></v-text-field>
                                    <v-text-field
                                        label="password"
                                        v-model="password"
                                        type="password"
                                        :rules="[rules.requerid, rules.password, rules.auth_error]"
                                    ></v-text-field>
                                    <v-row justify="center">
                                        <v-switch color="green" label="Remember Me" v-model="remember"></v-switch>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col md="2">
                                    <v-btn type="submit" outlined>Login</v-btn>
                                </v-col>
                                <v-col md="7">
                                    <v-btn
                                        x-small
                                        color="red"
                                        text
                                        :href="route_password_request"
                                    >Forgot your password???</v-btn>
                                </v-col>
                            </v-row>
                            <v-divider></v-divider>

                            <v-row justify="center">
                                <v-col md="4">
                                    <v-btn text disabled>not account???</v-btn>
                                </v-col>
                                <v-col md="4">
                                    <v-btn text color="green" :href="route_register">Register</v-btn>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
export default {
    props: [
        "route_login",
        "route_password_request",
        "route_register",
        "route_home"
    ],
    data() {
        return {
            overlay: false,
            email: "",
            auth_error: true,
            password: "",
            remember: false,
            rules: {
                requerid: value => !!value || "requerido",
                email: value =>
                    /^[\w|\.]+@[\w|\.]+$/.test(value) ||
                    "ingresa un email valido",
                auth_error: value => this.auth_error || this.auth_error,
                password: value =>
                    /^\w+$/.test(value) ||
                    "ingresa solo letras, digitos y guines bajos"
            }
        };
    },
    watch: {
    },
    methods: {
        verifica_errores_autenticacion() {
            if (this.auth_error !== true) {
                this.auth_error = true;
                this.$refs.form.validate();
            }
        },
        validate() {
            if (this.$refs.form.validate()) {
                this.overlay = true;
                axios
                    .post(this.route_login, {
                        email: this.email,
                        password: this.password,
                        remember: this.remember
                    })
                    .then(response => {
                        setTimeout(() => {
                            this.overlay = false;
                            window.location.href = this.route_home;
                        }, 1000);
                    })
                    .catch(error => {
                        this.auth_error = error.response.data.errors["email"][0];
                        this.overlay = false;
                        this.$refs.form.validate();
                    });
            }
        }
    }
};
</script>