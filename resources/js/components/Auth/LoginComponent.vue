<template>
    <div>
        <v-col md="4" offset-md="4">
            <v-card style="margin: 20vh 0;">
                <v-card-title>Login</v-card-title>
                <v-card-text>
                    <v-form ref="form" @submit.prevent="validate" @click.native="verifica_errores_autenticacion">
                        <v-text-field label="email" v-model="email" :rules="[rules.requerid, rules.email, rules.auth_error]"></v-text-field>
                        <v-text-field label="password" v-model="password" type="password" :rules="[rules.requerid, rules.password, rules.auth_error]"></v-text-field>
                        <v-col md="6" offset-md="3">
                            <v-switch color="green" label="Remember Me" v-model="remember"></v-switch>
                        </v-col>
                        <v-row>
                            <v-col offset-md="2">
                                <v-btn type="submit" outlined>Login</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn
                                    x-small
                                    color="red"
                                    text
                                    :href="route_password_request"
                                >Forgot your password???</v-btn>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>

                        <v-row>
                            <v-col md="3" offset-md="3">
                                <v-btn text disabled>not account???</v-btn>
                            </v-col>
                            <v-col md="6">
                                <v-btn text color="green" :href="route_register">Register</v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
    </div>
</template>

<script>
export default {
    props: ["route_login", "route_password_request", "route_register"],
    data() {
        return {
            email: "",
            auth_error: true,
            password: "",
            remember: false,
            rules: {
                requerid: value => !!value || "requerido",
                email: value =>
                    /^[\w|\.]+@[\w|\.]+$/.test(value) ||
                    "ingresa un email valido",
                auth_error: value =>
                    this.auth_error || this.auth_error,
                password: value =>
                    /^\w+$/.test(value) ||
                    "ingresa solo letras, digitos y guines bajos",
            }
        };
    },
    methods: {
        verifica_errores_autenticacion(){
            if(this.auth_error !== true) {
                this.auth_error = true;
                this.$refs.form.validate();
            }
        },
        validate() {
            if (this.$refs.form.validate()) {
                axios
                    .post(this.route_login, {
                        email: this.email,
                        password: this.password,
                        remember: this.remember
                    })
                    .then(response => {
                        console.log(response);
                        this.$refs.form.reset();
                    })
                    .catch(error => {
                        this.auth_error = error.response.data.errors["email"][0];
                        this.$refs.form.validate();
                    });
            }
        }
    }
};
</script>