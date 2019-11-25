<template>
    <div>
        <v-row>
            <v-col cols="12">
                <v-data-table
                    :headers="headersAsesorias"
                    :items="asesoriasInfo"
                    sort-by="fecha_hora"
                    class="elevation-24"
                >
                    <template #top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>
                                <v-btn @click="getInfoAsesorias" outlined color="green">Asesorias</v-btn>
                            </v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="showDialog_infoAsesoria" max-width="70vw">
                                <v-container>
                                    <v-card>
                                        <v-card-title>idAsesoria: {{asesoriaInfo_Dialog.idAsesoria}}</v-card-title>
                                        <v-card-text>
                                            <v-data-table
                                                :headers="headersPeticions_Asesoria"
                                                :items="peticionsInfo_Asesoria"
                                                sort-by="idPeticion"
                                            >
                                                <template #item.acciones="{item}">
                                                        <v-icon @click="eliminarPeticion_en_Asesoria(item)" title="elimina peticion de la asesoria">delete</v-icon>
                                                </template>
                                            </v-data-table>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-dialog>
                        </v-toolbar>
                    </template>
                    <template #item.action="{ item }">
                        <v-icon
                            @click="showMoreInfo_Asesoria(item)"
                            title="mostrar mas informacion de la asesoria"
                        >info</v-icon>
                        <v-icon @click="deleteAsesoria(item)" title="eliminar asesoria">delete</v-icon>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import EventBus from "../../app";
export default {
    props: ["id_profesor"],
    data() {
        return {
            showDialog_infoAsesoria: false,
            asesoriaInfo_Dialog: {},
            headersPeticions_Asesoria: [
                {
                    text: "ID Peticion",
                    align: "left",
                    sortable: false,
                    value: "idPeticion"
                },
                { text: "ID Alumno", value: "idAlumno" },
                { text: "Nombre Alumno", value: "nombreAlumno" },
                { text: "Tema Propuesto", value: "tema" },
                { text: "Acciones", value: "acciones" },
            ],
            peticionsInfo_Asesoria: [],
            headersAsesorias: [
                {
                    text: "idAsesoria",
                    align: "left",
                    sortable: false,
                    value: "idAsesoria"
                },
                { text: "Materia", value: "materia" },
                { text: "Tema", value: "tema" },
                { text: "Fecha-Hora", value: "fecha_hora" },
                { text: "Lugar", value: "lugar" },
                { text: "#Peticiones", value: "numPeticiones" },
                { text: "Acciones", value: "action", sortable: false }
            ],
            asesoriasInfo: [],
        };
    },
    methods: {
        getInfoAsesorias() {
            axios
                .get("http://ingweb.xgab.com/asesorias")
                .then(response => {
                    console.log(response.data);
                    this.asesoriasInfo = response.data;
                    // response.data.forEach(e => {
                    //     this.asesoriasInfo.push(e);
                    // });
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        showMoreInfo_Asesoria(asesoria) {
            let idAsesoria = asesoria.idAsesoria;
            axios
                .get(`http://ingweb.xgab.com/asesoria/peticiones/${idAsesoria}`)
                .then(response => {
                    console.log(response.data);
                    this.asesoriaInfo_Dialog = asesoria;
                    this.peticionsInfo_Asesoria = response.data;
                    this.showDialog_infoAsesoria = true;
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        deleteAsesoria(asesoria) {
            let idAsesoria = asesoria.idAsesoria;
            axios
                .delete("http://ingweb.xgab.com/asesorias/" + idAsesoria)
                .then(response => {
                    console.log(response.data);
                    let index = this.asesoriasInfo.indexOf(asesoria);
                    this.asesoriasInfo.splice(index, 1);
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        eliminarPeticion_en_Asesoria(peticionInfo){
            axios
            .get(`http://ingweb.xgab.com/asesoria/eliminaPeticion/${peticionInfo.idPeticion}`)
            .then(response => {
                console.log(response.data);
                let index = this.peticionsInfo_Asesoria.indexOf(peticionInfo);
                this.peticionsInfo_Asesoria.splice(index, 1);
            })
            .catch(error => {
                console.log(error.response) || console.log(error);
            });
        },
        cancelEditAsesoria(asesoria) {},
        saveAsesoria(asesoria) {}
    },
    created() {
        this.getInfoAsesorias();
        EventBus.$on("asesoriaAgendada", asesoria => {
            this.asesoriasInfo.push(asesoria);
        });
    }
};
</script>