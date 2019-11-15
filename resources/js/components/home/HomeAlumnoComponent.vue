<template>
    <div>
        <v-row>
            <!-- <v-col :cols="8">
                <v-card>
                    <v-card-title>idAlumno: {{id_alumno}}</v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-form ref="formAgendaAsesoria" action @submit.prevent="submit">
                                <v-row align="center" justify="center">
                                    <v-col :cols="8">
                                        <v-autocomplete
                                            :rules="[rules_AgendaAsesoria.requerid]"
                                            label="materia"
                                            :items="materiasDisponibles"
                                            v-model="materiaSeleccionada"
                                        ></v-autocomplete>
                                        <v-autocomplete
                                            :rules="[rules_AgendaAsesoria.requerid]"
                                            label="profesor"
                                            :items="info_profesores_by_materia[materiaSeleccionada]"
                                            v-model="profesorSeleccionado"
                                        ></v-autocomplete>
                                        <v-text-field
                                            :rules="[rules_AgendaAsesoria.requerid, rules_AgendaAsesoria.maxCaracteres]"
                                            label="tema"
                                            v-model="tema"
                                            counter
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row class="d-flex justify-space-around">
                                    <v-btn type="submit" outlined color="green">agendar</v-btn>
                                    <v-btn
                                        @click="$refs.formAgendaAsesoria.reset()"
                                        outlined
                                        color="yellow"
                                    >reset</v-btn>
                                </v-row>
                            </v-form>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-col>-->
            <v-col :cols="12">
                <v-card>
                    <v-card-title>Administrar Peticiones de Asesorias</v-card-title>
                    <v-card-text>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col :cols="12">
                <v-data-table
                    :headers="headers"
                    :items="peticionesAsesorias"
                    sort-by="materia"
                    class="elevation-1"
                >
                    <template v-slot:top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>Peticiones</v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="dialog" max-width="500px">
                                <template v-slot:activator="{ on }">
                                    <v-btn color="green" outlined v-on="on">Nueva Peticion</v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>idAlumno: {{id_alumno}}</v-card-title>
                                    <v-container>
                                        <v-form
                                            ref="formAgendaAsesoria"
                                            action
                                            @submit.prevent="submit"
                                        >
                                            <v-card-text>
                                                <v-row align="center" justify="center">
                                                    <v-col :cols="8">
                                                        <v-autocomplete
                                                            :rules="[rules_AgendaAsesoria.requerid]"
                                                            label="materia"
                                                            :items="materiasDisponibles"
                                                            v-model="materiaSeleccionada"
                                                        ></v-autocomplete>
                                                        <v-autocomplete
                                                            :rules="[rules_AgendaAsesoria.requerid]"
                                                            label="profesor"
                                                            :items="info_profesores_by_materia[materiaSeleccionada]"
                                                            v-model="profesorSeleccionado"
                                                        ></v-autocomplete>
                                                        <v-text-field
                                                            :rules="[rules_AgendaAsesoria.requerid, rules_AgendaAsesoria.maxCaracteres]"
                                                            label="tema"
                                                            v-model="tema"
                                                            counter
                                                        ></v-text-field>
                                                    </v-col>
                                                </v-row>
                                            </v-card-text>
                                            <v-card-actions>
                                                <v-container>
                                                    <v-row class="d-flex justify-space-around">
                                                        <v-btn
                                                            type="submit"
                                                            outlined
                                                            color="green"
                                                        >Agendar</v-btn>
                                                        <v-btn
                                                            @click="cancelPeticion"
                                                            outlined
                                                            color="red"
                                                        >Cancel</v-btn>
                                                    </v-row>
                                                </v-container>
                                            </v-card-actions>
                                        </v-form>
                                    </v-container>
                                </v-card>
                            </v-dialog>
                        </v-toolbar>
                    </template>
                    <template v-slot:item.estado="{ item }">
                        <v-chip :color="getColorEstado(item.estado)">{{ item.estado }}</v-chip>
                    </template>
                    <template v-slot:item.action="{ item }">
                        <v-icon @click="deletePeticion(item)">delete</v-icon>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: ["info_profesores_by_materia", "id_alumno"],
    data() {
        return {
            dialog: false,
            headers: [
                {
                    text: "idPeticion",
                    align: "left",
                    sortable: false,
                    value: "idPeticion"
                },
                { text: "Materia", value: "materia" },
                { text: "Profesor", value: "profesor" },
                { text: "Estado", value: "estado" },
                { text: "Tema Propuesto", value: "tema" },
                { text: "Acciones", value: "action", sortable: false }
            ],
            peticionesAsesorias: [],
            materiasDisponibles: [],
            materiaSeleccionada: "",
            profesorSeleccionado: "",
            tema: "",
            rules_AgendaAsesoria: {
                requerid: v => !!v || "campo requerido",
                maxCaracteres: v =>
                    (!!v && v.length <= 50) || "max 50 caracteres"
            }
        };
    },
    methods: {
        submit() {
            if (this.$refs.formAgendaAsesoria.validate()) {
                axios
                    .post("http://ingweb.xgab.com/peticionAsesoria", {
                        idAlumno: this.id_alumno,
                        nomMateria: this.materiaSeleccionada,
                        nomProfesor: this.profesorSeleccionado,
                        tema:this.tema,
                    })
                    .then(response => {
                        this.peticionesAsesorias.push({
                            idPeticion: response.data.idPeticion,
                            materia: this.materiaSeleccionada,
                            profesor: this.profesorSeleccionado,
                            estado:"pendiente",
                            temaPropuesto: this.tema,
                        });
                        console.log(response);
                        this.materiaSeleccionada = "";
                        this.profesorSeleccionado = "";
                        this.tema = "";
                        this.$refs.formAgendaAsesoria.reset();
                        this.dialog = false;
                    })
                    .catch(error => {
                        console.log(error.response);
                    });
            }
        },
        getColorEstado(estado){
            if(estado === "pendiente"){
                return "yellow";
            } else if(estado === "aceptado"){
                return "green";
            }
            return "red";
        },
        getInfoPeticiones() {
            axios
                .get("http://ingweb.xgab.com/peticionAsesoria")
                .then(response =>{
                    console.log(response.data);
                    response.data.forEach(e=>{
                        this.peticionesAsesorias.push(e);
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },

        deletePeticion(item) {
            //
            // corregir
            //
            // const index = this.peticionesAsesorias.indexOf(item);
            // this.peticionesAsesorias.splice(index, 1);
        },

        cancelPeticion() {
            this.dialog = false;
            this.$refs.formAgendaAsesoria.reset();
        }
    },
    mounted() {
        Object.keys(this.info_profesores_by_materia).forEach(materia => {
            this.materiasDisponibles.push(materia);
        });
    },
    watch: {},
    created() {
        this.getInfoPeticiones();
    }
};
</script>