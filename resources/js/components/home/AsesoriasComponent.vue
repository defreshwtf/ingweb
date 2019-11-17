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
                            <v-toolbar-title>Asesorias</v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="showDialog_infoAsesoria" max-width="70vw">
                                <v-container>
                                    <v-card>
                                        <v-card-title>idAsesoria: {{id_profesor}}</v-card-title>
                                        <v-card-text></v-card-text>
                                        <v-card-actions>
                                            <v-container>
                                                <v-row class="d-flex justify-space-around">
                                                    <v-btn
                                                        @click="saveAsesoria"
                                                        outlined
                                                        color="green"
                                                    >guardar</v-btn>
                                                    <v-btn
                                                        @click="cancelEditAsesoria"
                                                        outlined
                                                        color="red"
                                                    >Cancel</v-btn>
                                                </v-row>
                                            </v-container>
                                        </v-card-actions>
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
export default {
    props: ["id_profesor"],
    data() {
        return {
            showDialog_infoAsesoria: false,
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
                { text: "Acciones", value: "action", sortable: false }
            ],
            asesoriasInfo: [
                {
                    idAsesoria: "idAsesoria",
                    materia: "materia",
                    tema: "tema",
                    fecha_hora: "fecha_hora",
                    lugar: "lugar"
                }
            ],
            asesoriasInfo_Alumnos: []
        };
    },
    methods: {
        showMoreInfo_Asesoria(asesoria) {
            this.showDialog_infoAsesoria = true;
        },
        deleteAsesoria(asesoria) {},
        cancelEditAsesoria(asesoria) {},
        saveAsesoria(asesoria) {},
    },
};
</script>