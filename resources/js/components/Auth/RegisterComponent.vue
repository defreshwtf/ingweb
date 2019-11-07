<template>
    <div>
        <v-row justify="center">
            <v-col md="6">
                <v-card style="margin: 20vh 0;">
                    <v-card-title>Register</v-card-title>
                    <v-card-text>
                        <v-form
                            ref="form"
                            @submit.prevent="validate"
                            @click.native="restableceErroresValidacion"
                        >
                            <v-row justify="center">
                                <v-col md="6">
                                    <v-text-field
                                        label="name"
                                        v-model="name"
                                        :rules="[rules.requerid, rules.max, rules.espaciosBlanco]"
                                    ></v-text-field>
                                    <v-text-field
                                        label="email"
                                        v-model="email"
                                        :rules="[rules.requerid, rules.email, rules.espaciosBlanco, rules.usuarioExistente]"
                                    ></v-text-field>
                                    <v-text-field
                                        label="password"
                                        v-model="password"
                                        :rules="[rules.requerid, rules.espaciosBlanco]"
                                        counter
                                        :type="'password'"
                                    ></v-text-field>
                                    <v-text-field
                                        label="confirm password"
                                        v-model="passwordConfirm"
                                        :rules="[rules.requerid, rules.passwordConfirm, rules.espaciosBlanco]"
                                        counter
                                        :type="'password'"
                                    ></v-text-field>
                                    <v-select
                                        :items="itemsTipoUsuario"
                                        v-model="tipoUsuario"
                                        label="tipo Usuario"
                                        :rules="[rules.requerid, rules.espaciosBlanco]"
                                    ></v-select>
                                </v-col>
                            </v-row>
                            <v-autocomplete
                                v-show="muestraInputMaterias"
                                v-model="materiasSeleccionadas"
                                :items="materiasDisponibles"
                                filled
                                chips
                                label="materias"
                                multiple
                                :rules="[rules.requeridMaterias]"
                                placeholder="busca materia..."
                            ></v-autocomplete>
                            <v-row justify="center">
                                <v-col md="4">
                                    <v-btn outlined type="submit">Register</v-btn>
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
    props: ["route_register", "route_home"],
    data() {
        return {
            overlay: false,
            muestraInputMaterias: false,
            error_usuarioExistente: true,
            itemsTipoUsuario: ["Profesor", "Alumno"],
            name: "",
            email: "",
            password: "",
            passwordConfirm: "",
            tipoUsuario: "",
            materiasSeleccionadas: [],
            materiasDisponibles: [
                "Formación Humana y Social",
                "DHPC",
                "DHTIC",
                "Matemáticas Elementales",
                "Algebra Superior",
                "Cálculo Diferencial",
                "Matemáticas Discretas",
                "Geometría Análitica con Algebra Lineal",
                "Cálculo Integral",
                "Probabilidad y Estadística",
                "Ecuaciones Diferenciales",
                "HAA",
                "Redacción",
                "Metodología de la Programación",
                "Ensamblador",
                "Programación I",
                "Sistemas Operativos I",
                "Programación II",
                "Estructuras de Datos",
                "Graficación",
                "Innovación y Talento Emprendedor",
                "Métodos Numéricos",
                "Programación Concurrente y Paralela",
                "Circuitos Eléctricos",
                "Diseño Digital",
                "Sistemas Operativos II",
                "Circuitos Electrónicos",
                "Programación Distribuida",
                "Sistemas Digitales",
                "Microprocesadores e Interfaces",
                "Transmisión y Comunicación de Datos",
                "Base de Datos",
                "Modelo de Redes",
                "Administración de Redes",
                "Redes Inalámbricas",
                "Análisis y Diseño de Algoritmos",
                "Arquitectura de Computadoras",
                "Sistemas Empotrados",
                "Ingeniería de Software",
                "Desarrollo de Aplicaciones Móviles",
                "Administración de Proyectos",
                "Proyectos I+D I",
                "Proyectos I+D II",
                "Tópicos en Ingeniería",
                "Arquitectura Avanzada de Computadoras",
                "Control Digital",
                "Diseño de Sistemas de Tiempo Real",
                "Sistemas de Tiempo Real",
                "Ingeniería Web",
                "Minería de Datos",
                "Tratamiento de la Información",
                "Ingeniería de Software Avanzada",
                "Introducción a la Robótica",
                "Aplicaciones Multimedia",
                "Técnicas de Inteligencia Artificial",
                "Interacción Humano Computadora",
                "Procesamiento Digital de Imágenes",
                "Animación por Computadora",
                "Simulación",
                "Investigación de Operaciones",
                "Aplicaciones Web",
                "Intercomunicación y Seguridad en Redes",
                "Cómputo Obicuo",
                "Introducción a los Compiladores"
            ],
            rules: {
                requerid: v => !!v || "requerido",
                requeridMaterias: v =>
                    !this.muestraInputMaterias ||
                    !!v.length ||
                    "campo requerido",
                max: v => (!!v && v.length <= 20) || "max 20 caracteres",
                email: v =>
                    /^[\w|\.]+@[\w|\.]+$/.test(v) || "ingresa un email valido",
                passwordConfirm: v =>
                    v == this.password || "verifica las contraseñas",
                password: v =>
                    /^\w+$/.test(v) ||
                    "ingresa solo letras, digitos y guines bajos",
                espaciosBlanco: v =>
                    !/\s+/.test(v) || "elimina espacios en blanco",
                usuarioExistente: v =>
                    this.error_usuarioExistente || this.error_usuarioExistente
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
        },
        tipoUsuario() {
            if (this.tipoUsuario == "Profesor") {
                this.muestraInputMaterias = true;
            } else {
                this.muestraInputMaterias = false;
            }
        }
    },
    methods: {
        restableceErroresValidacion() {
            if(this.error_usuarioExistente !== true) {
                this.error_usuarioExistente = true;
                this.$refs.form.validate();
            }
        },
        validate() {
            if (this.$refs.form.validate()) {
                axios
                    .post(this.route_register, {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.passwordConfirm,
                        tipo_usuario: this.tipoUsuario,
                        materias_seleccionadas: this.materiasSeleccionadas
                    })
                    .then(response => {
                        this.overlay = !this.overlay;
                    })
                    .catch(error => {
                        console.log(error);
                        if (error.response.data.errors.email != undefined) {
                            this.error_usuarioExistente =
                                error.response.data.errors.email[0];
                                this.$refs.form.validate();
                        }
                    });
            }
        }
    }
};
</script>