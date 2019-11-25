<template>
    <div>
        <v-container>
            <v-row>
                <v-col cols="8">
                    <v-card>
                        <v-card-title>Administrar Asesorias Profesor</v-card-title>
                        <v-card-text>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="4">
                    <v-card>
                        <v-card-title>Administrar Asesorias</v-card-title>
                        <v-card-text>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!</v-card-text>
                    </v-card>
                </v-col>
            </v-row>
            <v-row v-if="estadoProfesor == 'rechazado'" justify="center">
                <v-col cols="6">
                    actualmente su estado es: {{estadoProfesor}}
                </v-col>
                <v-col cols="3">
                    <v-btn outlined color="green" @click="verificaEstadoProfesor">verificar estado</v-btn>
                </v-col>
            </v-row>
            <v-row v-else>
                <v-col>
                    <peticiones-component :id_profesor="profesor.id"></peticiones-component>
                </v-col>
                <v-col>
                    <asesorias-component :id_profesor="profesor.id"></asesorias-component>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import EventBus from "../../app";
export default {
    props: ["profesor"],
    data() {
        return {
            estadoProfesor: "rechazado",
        };
    },
    methods: {
        verificaEstadoProfesor() {
            axios
                .get(
                    `http://ingweb.xgab.com/profesores/${this.profesor.id}`
                )
                .then(response => {
                    console.log(response.data);
                    this.profesor.estado = response.data.estado;
                    this.estadoProfesor = this.profesor.estado;
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        }
    },
    created() {
        setInterval(this.verificaEstadoProfesor,20000);
    },
    watch: {}
};
</script>