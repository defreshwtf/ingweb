<template>
    <div>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title>Administrar Profesores</v-card-title>
                    <v-card-text>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="profesoresinfo"
                    sort-by="materia"
                    class="elevation-1"
                >
                    <template #top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>
                                <v-btn
                                    outlined
                                    color="green"
                                    @click="getInfoProfesores"
                                >Administrar Profesores</v-btn>
                            </v-toolbar-title>
                            <v-divider class="mx-4" inset vertical></v-divider>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                    </template>
                    <template #item.estado="{ item }">
                        <v-chip :color="getColorEstado(item.estado)">{{ item.estado }}</v-chip>
                    </template>
                    <template #item.action="{ item }">
                        <v-icon>info</v-icon>
                        <v-icon
                            @click="setEstadoProfesor(item,'aceptado')"
                            v-if="item.estado == 'pendiente'"
                            title="aceptar al profesor"
                        >add_box</v-icon>
                        <v-icon
                            @click="setEstadoProfesor(item,'aceptado')"
                            v-if="item.estado == 'rechazado'"
                            title="cambiar el estado del profesor a aceptado"
                        >add_box</v-icon>
                        <v-icon
                            @click="setEstadoProfesor(item,'rechazado')"
                            v-if="item.estado == 'pendiente'"
                            title="rechaza al profesor"
                        >backspace</v-icon>
                        <v-icon
                            @click="setEstadoProfesor(item,'rechazado')"
                            v-if="item.estado == 'aceptado'"
                            title="cambiar el estado del profesor a rechazado"
                        >backspace</v-icon>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: ["administrador"],
    data() {
        return {
            headers: [
                {
                    text: "ID Profesor",
                    sortable: false,
                    value: "idProfesor"
                },
                { text: "Nombre", value: "nombre" },
                { text: "Estado", value: "estado" },
                { text: "Acciones", value: "action" }
            ],
            profesoresinfo: []
        };
    },
    methods: {
        getInfoProfesores() {
            axios
                .get("http://ingweb.xgab.com/profesores")
                .then(response => {
                    console.log(response.data);
                    this.profesoresinfo = response.data;
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        },
        getColorEstado(estado) {
            if (estado === "pendiente") {
                return "yellow";
            } else if (estado === "aceptado") {
                return "green";
            }
            return "red";
        },
        setEstadoProfesor(profesor, estado) {
            axios
                .put(`http://ingweb.xgab.com/profesores/${profesor.idProfesor}`, {
                    estado: estado
                })
                .then(response => {
                    console.log(response.data);
                    let profesorNew = response.data;
                    profesor.estado = profesorNew.estado;
                })
                .catch(error => {
                    console.log(error.response) || console.log(error);
                });
        }
    },
    created() {
        this.getInfoProfesores();
    }
};
</script>