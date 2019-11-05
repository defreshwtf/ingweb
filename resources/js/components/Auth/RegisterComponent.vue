<template>
    <div>
        <v-col md="6" offset-md="3">
            <v-card style="margin: 20vh 0;">
                <v-card-title>Register</v-card-title>
                <v-card-text>
                    <v-form ref="form" @submit.prevent="validate">
                        <v-row align="center" justify="center">
                            <v-col cols="6">
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
                            </v-col>
                        </v-row>
                        <v-autocomplete
                            v-model="materiasSeleccionadas"
                            :items="materiasDisponibles"
                            filled
                            chips
                            label="materias"
                            multiple
                            :rules="[rules.requeridArray]"
                            placeholder="busca materia..."
                        ></v-autocomplete>
                        <v-col md="5" offset-md="4">
                            <v-btn outlined type="submit">Register</v-btn>
                        </v-col>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
export default {
    props: ["route_register", "route_home"],
    data() {
        return {
            overlay: false,
            itemsTipoUsuario: ["Profesor", "Alumno"],
            name: "",
            email: "",
            password: "",
            passwordConfirm: "",
            tipoUsuario: "",
            materiasSeleccionadas: [],
            materiasDisponibles: [
                "Diseño Digital",
                "Metodologia de la Programacion",
                "Programacion 1",
                "Ensamblador"
            ],
            rules: {
                requerid: v => !!v || "requerido",
                requeridArray: v => !!v.length || "campo requerido",
                max: v => (!!v && v.length <= 20) || "max 20 caracteres",
                email: v =>
                    /^[\w|\.]+@[\w|\.]+$/.test(v) || "ingresa un email valido",
                passwordConfirm: v =>
                    v == this.password || "verifica las contraseñas",
                password: v =>
                    /^\w+$/.test(v) ||
                    "ingresa solo letras, digitos y guines bajos",
            }
        };
    },
    watch: {
        overlay(val) {
            val &&
                setTimeout(() => {
                    this.overlay = false;
                    window.location.href = this.route_home;
                }, 2000);
        }
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
                    .then(response => {
                        console.log(response);
                        this.overlay = !this.overlay;
                    })
                    .catch(error => {
                        console.log(error.response);
                    });
            }
        }
    }
};
</script>