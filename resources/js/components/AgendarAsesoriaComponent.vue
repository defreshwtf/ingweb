<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Agendar Asesoria</div>

                    <div class="card-body">
                        <v-form @submit.prevent="agendarAsesoria">
                            <v-divider></v-divider>
                            <v-autocomplete
                                label="selecciona a tu profesor..."
                                :items="profesores"
                                filled
                                rounded
                                v-model="nuevaAsesoria.profesor"
                            ></v-autocomplete>

                            <p class="text-center">Selecciona la fecha y el Horario</p>
                            <v-row justify="space-around">
                                <v-date-picker
                                    v-model="nuevaAsesoria.fecha"
                                    :show-current="true"
                                    :type="'date'"
                                ></v-date-picker>
                                <v-time-picker v-model="nuevaAsesoria.hora"></v-time-picker>
                            </v-row>
                            <v-divider></v-divider>
                            <v-row justify="center">
                                <v-btn type="submit">agendar</v-btn>
                            </v-row>
                        </v-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            profesores: [
                "1profesor1",
                "2profesor2",
                "3profesor3",
                "4profesor4",
                "5profesor5",
                "6profesor6",
                "7profesor7",
                "8profesor8",
                "9profesor9",
                "10profesor10",
            ],
            asesorias: [],
            nuevaAsesoria: {
                profesor: "",
                fecha: new Date().toISOString().substr(0, 10),
                hora: null
            }
        };
    },
    methods:{
        agendarAsesoria(){
            console.log(this.nuevaAsesoria);
        }
    }
};
</script>