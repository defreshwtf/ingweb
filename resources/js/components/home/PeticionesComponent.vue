<template>
    <div>
        <v-row>
            <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="peticionesAsesorias"
                    sort-by="materia"
                    class="elevation-24"
                >
                    <!-- <template #item.add="{ item }"></template> -->
                    <template #top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>Peticiones</v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="dialog" max-width="70vw">
                                <template #activator="{ on }">
                                    <v-badge color="green" :left="true">
                                        <v-btn
                                            v-show="peticionesSeleccionadas.length > 0"
                                            color="green"
                                            outlined
                                            v-on="on"
                                        >Agendar Asesoria</v-btn>
                                        <v-btn
                                            outlined
                                            color="red"
                                            v-show="peticionesSeleccionadas.length == 0"
                                        >agrega peticiones para agendar una asesoria</v-btn>
                                        <template #badge>
                                            <span
                                                v-if="peticionesSeleccionadas.length > 0"
                                            >{{ peticionesSeleccionadas.length }}</span>
                                        </template>
                                    </v-badge>
                                </template>
                                <v-card>
                                    <v-card-title>idProfesor: {{id_profesor}}</v-card-title>
                                    <v-container>
                                        <v-form
                                            ref="formAgendaAsesoria"
                                            action
                                            @submit.prevent="agendaAsesoria"
                                        >
                                            <v-card-text>
                                                <v-container>
                                                    <v-row justify="center">
                                                        <v-col cols="7">
                                                            <v-text-field
                                                                counter
                                                                prepend-icon="menu_book"
                                                                label="tema Asesoria"
                                                                v-model="tema"
                                                                :rules="[rules_AgendaAsesoria.requerid]"
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="7">
                                                            <v-text-field
                                                                prepend-icon="place"
                                                                counter
                                                                label="lugar"
                                                                v-model="lugar"
                                                                :rules="[rules_AgendaAsesoria.requerid]"
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="7">
                                                            <v-menu
                                                                v-model="showSelectFecha"
                                                                :close-on-content-click="false"
                                                                transition="scale-transition"
                                                                offset-y
                                                                max-width="290px"
                                                                min-width="290px"
                                                            >
                                                                <template #activator="{ on }">
                                                                    <v-text-field
                                                                        v-model="fechaSeleccionada"
                                                                        prepend-icon="event"
                                                                        v-on="on"
                                                                        label="fecha"
                                                                        :rules="[rules_AgendaAsesoria.requerid]"
                                                                    ></v-text-field>
                                                                </template>
                                                                <v-date-picker
                                                                    v-model="fechaSeleccionada"
                                                                    no-title
                                                                    @input="showSelectFecha = false"
                                                                    :min="minFecha"
                                                                ></v-date-picker>
                                                            </v-menu>
                                                        </v-col>

                                                        <v-col cols="7">
                                                            <v-menu
                                                                ref="menu"
                                                                v-model="showSelectHora"
                                                                :close-on-content-click="false"
                                                                :nudge-right="40"
                                                                :return-value.sync="horaSeleccionada"
                                                                transition="scale-transition"
                                                                offset-y
                                                                max-width="290px"
                                                                min-width="290px"
                                                            >
                                                                <template #activator="{ on }">
                                                                    <v-text-field
                                                                        v-model="horaSeleccionada"
                                                                        label="hora"
                                                                        prepend-icon="access_time"
                                                                        readonly
                                                                        v-on="on"
                                                                        :rules="[rules_AgendaAsesoria.requerid]"
                                                                    ></v-text-field>
                                                                </template>
                                                                <v-time-picker
                                                                    v-if="showSelectHora"
                                                                    v-model="horaSeleccionada"
                                                                    full-width
                                                                    :allowed-hours="allowedHours"
                                                                    format="24hr"
                                                                    @click:minute="$refs.menu.save(horaSeleccionada)"
                                                                    :min="minHora"
                                                                ></v-time-picker>
                                                            </v-menu>
                                                        </v-col>
                                                        <v-data-table
                                                            :headers="headers"
                                                            :items="peticionesSeleccionadas"
                                                            sort-by="tema"
                                                        >
                                                            <template #item.action="{ item }">
                                                                <v-icon
                                                                    @click="deletePeticion_fromAsesoria(item)"
                                                                    title="eliminar peticion de la asesoria"
                                                                >delete</v-icon>
                                                            </template>
                                                        </v-data-table>
                                                    </v-row>
                                                </v-container>
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
                                                            @click="cancelAsesoria"
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
                    <template #item.estado="{ item }">
                        <v-chip :color="getColorEstado(item.estado)">{{ item.estado }}</v-chip>
                    </template>
                    <template #item.action="{ item }">
                        <v-icon
                            v-if="item.estado != 'rechazada'"
                            @click="rechazarPeticion(item)"
                            title="eliminar peticion"
                        >delete</v-icon>
                        <v-icon
                            v-if="item.estado != 'rechazada'"
                            @click="addAlumno_to_Asesoria(item)"
                            title="agrega la peticion para crear una asesoria"
                        >add</v-icon>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: ["id_profesor"],
    data() {
        return {
            dialog: false,
            showSelectFecha: false,
            fechaSeleccionada: new Date().toISOString().substr(0, 10),
            minFecha: moment().format("YYYY-MM-DD"),
            minHora: "",
            showSelectHora: false,
            horaSeleccionada: null,
            tema: "",
            lugar: "",
            materia: "",
            peticionesSeleccionadas: [],
            headers: [
                {
                    text: "idPeticion",
                    align: "left",
                    sortable: false,
                    value: "idPeticion"
                },
                { text: "Materia", value: "materia" },
                { text: "Estado", value: "estado" },
                { text: "Tema Propuesto", value: "tema" },
                { text: "Acciones", value: "action", sortable: false }
            ],
            peticionesAsesorias: [],
            rules_AgendaAsesoria: {
                requerid: v => !!v || "campo requerido",
                maxCaracteres: v =>
                    (!!v && v.length <= 50) || "max 50 caracteres"
            }
        };
    },
    methods: {
        allowedHours: v => v >= 7 && v <= 18,
        getColorEstado(estado) {
            if (estado === "pendiente") {
                return "yellow";
            } else if (estado === "aceptado") {
                return "green";
            }
            return "red";
        },
        getInfoPeticiones() {
            axios
                .get("http://ingweb.xgab.com/peticionAsesoria")
                .then(response => {
                    // console.log(response.data);
                    response.data.forEach(e => {
                        this.peticionesAsesorias.push(e);
                    });
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        cancelAsesoria() {
            //
            // al reiniciar un form con un data table causa errores en el data table
            //
            // this.$refs.formAgendaAsesoria.reset();
            this.dialog = false;
            this.peticionesSeleccionadas.forEach(e => {
                this.peticionesAsesorias.push(e);
            });
            this.peticionesSeleccionadas = [];
            this.materia = "";
        },
        agendaAsesoria() {
            if (this.$refs.formAgendaAsesoria.validate()) {
                axios
                    .post("http://ingweb.xgab.com/asesorias", {
                        peticionesSeleccionadas: this.peticionesSeleccionadas,
                        fechaSeleccionada: this.fechaSeleccionada,
                        horaSeleccionada: this.horaSeleccionada,
                        tema: this.tema,
                        lugar: this.lugar
                    })
                    .then(response => {
                        let idAsesoria = response.data.idAsesoria;
                        let materia = response.data.materia;
                        // console.log(response.data);
                        this.$emit("asesoriaAgendada", {
                            idAsesoria: idAsesoria,
                            materia: materia,
                            tema: this.tema,
                            fecha_hora:
                                this.fechaSeleccionada +
                                " " +
                                this.horaSeleccionada,
                            lugar: this.lugar
                        });
                        this.tema = "";
                        this.lugar = "";
                        this.fechaSeleccionada = new Date()
                            .toISOString()
                            .substr(0, 10);
                        this.horaSeleccionada = null;
                        this.dialog = false;
                        this.peticionesSeleccionadas = [];
                        this.materia = "";
                    })
                    .catch(error => {
                        console.log(error.response) || console.log(error);
                    });
            }
        },
        rechazarPeticion(peticion) {
            let idPeticion = peticion.idPeticion;
            axios
                .get(
                    `http://ingweb.xgab.com/peticionAsesoria/${idPeticion}/edit`
                )
                .then(response => {
                    console.log(response.data);
                    peticion.estado = "rechazada";
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        deletePeticion_fromAsesoria(peticionInfo) {
            let index = this.peticionesSeleccionadas.indexOf(peticionInfo);
            this.peticionesSeleccionadas.splice(index, 1);
            this.peticionesAsesorias.push(peticionInfo);
            if(this.peticionesSeleccionadas.length == 0){
                this.materia = "";
            }
        },
        addAlumno_to_Asesoria(peticionInfo) {
            if(this.materia == ""){
                this.materia = peticionInfo.materia;
            } else if(this.materia != peticionInfo.materia){
                alert(`la materia para la asesoria actual es: ${this.materia}`);
                return;
            }
            // if (peticionInfo.estado != "rechazada") {
            let index = this.peticionesAsesorias.indexOf(peticionInfo);
            this.peticionesAsesorias.splice(index, 1);
            this.peticionesSeleccionadas.push(peticionInfo);
            // }
            // console.log(this.peticionesSeleccionadas);
            // console.log(this.peticionesSeleccionadas.length);
        }
    },
    created() {
        this.getInfoPeticiones();
    },
    watch: {
        fechaSeleccionada(fecha) {
            this.horaSeleccionada = null;
            if (moment().format("YYYY-MM-DD") == fecha) {
                this.minHora = moment()
                    .add("1", "hours")
                    .format("HH:mm");
            } else {
                this.minHora = "";
            }
        }
    }
};
</script>