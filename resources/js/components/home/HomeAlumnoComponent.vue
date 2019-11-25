<template>
    <div>
        <v-row>
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
                    <template #top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>Peticiones</v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="dialog" max-width="500px">
                                <template #activator="{ on }">
                                    <v-btn color="green" outlined v-on="on">Nueva Peticion</v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>idAlumno: {{alumno.id}}</v-card-title>
                                    <v-container>
                                        <v-form
                                            ref="formAgendaAsesoria"
                                            action
                                            @submit.prevent="submit"
                                        >
                                            <v-card-text>
                                                <v-row align="center" justify="center">
                                                    <v-col :cols="8">
                                                        <v-select label="selecciona filtro"
                                                            :items="filtrosDisponibles"
                                                            v-model="filtroSeleccionado"
                                                        ></v-select>
                                                        <v-autocomplete
                                                            :rules="[rules_AgendaAsesoria.requerid]"
                                                            label="materia"
                                                            :items="materiasDisponibles"
                                                            v-model="materiaSeleccionada"
                                                        ></v-autocomplete>
                                                        <v-autocomplete
                                                            :rules="[rules_AgendaAsesoria.requerid]"
                                                            label="profesor"
                                                            :items="profesoresDisponibles"
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
                            <v-dialog v-model="showDialogInfoAsesorias" max-width="500px">
                                <v-card>
                                    <v-card-title>idAsesoria: {{infoAsesoria_peticion.id}}</v-card-title>
                                    <v-container>
                                        <v-text-field
                                            label="tema"
                                            disabled
                                            v-model="infoAsesoria_peticion.asesoria.tema"
                                        ></v-text-field>
                                        <v-text-field
                                            label="lugar"
                                            disabled
                                            v-model="infoAsesoria_peticion.asesoria.lugar"
                                        ></v-text-field>
                                        <v-text-field
                                            label="fecha - hora"
                                            disabled
                                            v-model="infoAsesoria_peticion.asesoria.fecha_hora"
                                        ></v-text-field>
                                        <v-text-field
                                            label="profesor"
                                            disabled
                                            v-model="infoAsesoria_peticion.asesoria.profesor"
                                        ></v-text-field>
                                    </v-container>
                                </v-card>
                            </v-dialog>
                        </v-toolbar>
                    </template>
                    <template #item.estado="{ item }">
                        <v-chip :color="getColorEstado(item.estado)">{{ item.estado }}</v-chip>
                    </template>
                    <template #item.action="{ item }">
                        <v-icon
                            v-if="item.estado == 'aceptada'"
                            @click="mostrarInfoAsesoria(item)"
                        >info</v-icon>
                        <v-icon @click="deletePeticion(item)">delete</v-icon>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: ["alumno"],
    data() {
        return {
            dialog: false,
            showDialogInfoAsesorias: false,
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
            materiasDisponiblesInfo: {},
            profesoresDisponibles: [],
            profesoresDisponiblesInfo: {},
            filtrosDisponibles: ["Materia", "Profesor"],
            filtroSeleccionado: "",
            materiaSeleccionada: "",
            profesorSeleccionado: "",
            tema: "",
            rules_AgendaAsesoria: {
                requerid: v => !!v || "campo requerido",
                maxCaracteres: v =>
                    (!!v && v.length <= 50) || "max 50 caracteres"
            },
            infoAsesoria_peticion: {
                id: "",
                asesoria: {
                    id: "",
                    tema: "",
                    lugar: "",
                    fecha_hora: "",
                    profesor: ""
                }
            }
        };
    },
    methods: {
        submit() {
            if (this.$refs.formAgendaAsesoria.validate()) {
                axios
                    .post("http://ingweb.xgab.com/peticionAsesoria", {
                        idAlumno: this.alumno.id,
                        nomMateria: this.materiaSeleccionada,
                        nomProfesor: this.profesorSeleccionado,
                        tema: this.tema
                    })
                    .then(response => {
                        this.peticionesAsesorias.push({
                            idPeticion: response.data.idPeticion,
                            materia: this.materiaSeleccionada,
                            profesor: this.profesorSeleccionado,
                            estado: "pendiente",
                            tema: this.tema
                        });
                        console.log(response.data);
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
        getColorEstado(estado) {
            if (estado === "pendiente") {
                return "yellow";
            } else if (estado === "aceptada") {
                return "green";
            }
            return "red";
        },
        getInfoPeticiones() {
            axios
                .get("http://ingweb.xgab.com/peticionAsesoria")
                .then(response => {
                    console.log(response.data);
                    response.data.forEach(e => {
                        this.peticionesAsesorias.push(e);
                    });
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },

        deletePeticion(item) {
            const index = this.peticionesAsesorias.indexOf(item);
            this.peticionesAsesorias.splice(index, 1);
            let idPeticion = item.idPeticion;
            axios
                .delete(`http://ingweb.xgab.com/peticionAsesoria/${idPeticion}`)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },

        cancelPeticion() {
            this.dialog = false;
            this.$refs.formAgendaAsesoria.reset();
        },
        mostrarInfoAsesoria(item) {
            let idPeticion = item.idPeticion;
            this.showDialogInfoAsesorias = true;
            axios
                .get(`http://ingweb.xgab.com/peticionAsesoria/${idPeticion}`)
                .then(response => {
                    console.log(response.data);
                    this.infoAsesoria_peticion = response.data;

                    // this.infoAsesoria_peticion.id = peticion.id;
                    // this.infoAsesoria_peticion.asesoria.id = peticion.asesoria.id;
                    // this.infoAsesoria_peticion.asesoria.tema = peticion.asesoria.tema;
                    // this.infoAsesoria_peticion.asesoria.fecha_hora = peticion.asesoria.fecha_hora;
                    // this.infoAsesoria_peticion.asesoria.profesor = peticion.asesoria.profesor;
                    // this.infoAsesoria_peticion.asesoria.lugar = peticion.asesoria.lugar;
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        }
    },
    mounted() {},
    watch: {
        filtroSeleccionado(filtro){
            this.profesoresDisponibles = [];
            this.materiasDisponibles = [];
            if(filtro == "Profesor") {

                axios
                .get(`http://ingweb.xgab.com/profesoresAceptados`)
                .then(response => {
                    console.log(response.data);
                    this.profesoresDisponibles = Object.keys(response.data);
                    this.profesoresDisponiblesInfo = response.data;
                    if(this.profesoresDisponibles.length == 1){
                        this.materiasDisponibles = this.profesoresDisponiblesInfo[this.profesoresDisponibles[0]];
                    } else{
                        this.materiasDisponibles = [];
                    }
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
            } else {
                axios
                .get(`http://ingweb.xgab.com/materiasConProfesoresAceptados`)
                .then(response => {
                    console.log(response.data);
                    this.materiasDisponibles = Object.keys(response.data);
                    this.materiasDisponiblesInfo = response.data;
                    if(this.materiasDisponibles.length == 1){
                        this.profesoresDisponibles = this.materiasDisponiblesInfo[this.materiasDisponibles[0]];
                    } else{
                        this.profesoresDisponibles = [];
                    }
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
            }
        },
        materiaSeleccionada(v){
            if(v != ""){
                if(this.profesoresDisponibles.length == 0){
                    this.profesoresDisponibles = this.materiasDisponiblesInfo[v];
                }
            } else {
                console.log("vacio");
            }
        },
        profesorSeleccionado(v){
            if(v != ""){
                if(this.materiasDisponibles.length == 0){
                    this.materiasDisponibles = this.profesoresDisponiblesInfo[v];
                }
            } else {
                console.log("vacio");
            }            
        },
    },
    created() {
        this.getInfoPeticiones();
    }
};
</script>