<template>
    <div>
        <v-col md="4" offset-md="4">
            <v-card style="margin: 20vh 0;">
                <v-card-title>Register</v-card-title>
                <v-card-text>
                    <v-form ref="form" @submit.prevent="validate">
                        <v-text-field
                            label="name"
                            v-model="name"
                            :rules="[rules.requerid, rules.max]"
                        ></v-text-field>
                        <v-text-field
                            label="email"
                            v-model="email"
                            :rules="[rules.requerid, rules.email]"
                        ></v-text-field>
                        <v-text-field
                            label="password"
                            v-model="password"
                            :rules="[rules.requerid]"
                            counter
                            :type="'password'"
                        ></v-text-field>
                        <v-text-field
                            label="confirm password"
                            v-model="passwordConfirm"
                            :rules="[rules.requerid, rules.passwordConfirm]"
                            counter
                            :type="'password'"
                        ></v-text-field>
                        <v-select
                            :items="itemsTipoUsuario"
                            v-model="tipoUsuario"
                            label="tipo Usuario"
                            :rules="[rules.requerid]"
                        ></v-select>
                        <v-col md="5" offset-md="4">
                            <v-btn outlined type="submit">Register</v-btn>
                        </v-col>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
    </div>
</template>

<script>
export default {
    props: ["route_register"],
    data() {
        return {
            itemsTipoUsuario: ["Profesor", "Alumno"],
            name: "",
            email: "",
            password: "",
            passwordConfirm: "",
            tipoUsuario: "",
            rules: {
                requerid: value => !!value || "requerido",
                max: value => value.length <= 20 || "max 20 caracteres",
                email: value =>
                    /^[\w|\.]+@[\w|\.]+$/.test(value) ||
                    "ingresa un email valido",
                passwordConfirm: value =>
                    value == this.password || "verifica las contraseñas",
                password: value =>
                    /^\w+$/.test(value) ||
                    "ingresa solo letras, digitos y guines bajos",
            }
        };
    },
    methods: {
        validate() {
            if (this.$refs.form.validate()) {
                axios
                    .post(this.route_register, {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.passwordConfirm,
                        tipo_usuario: this.tipoUsuario
                    })
                    .then(function(response) {
                        console.log(response);
                    })
                    .catch(function(error) {
                        console.log(error.response);
                    });
            }
        }
    }
};
</script>