<template>
    <div>
        <v-row>
            <v-col :cols="8">
                <v-row>
                    <v-col :cols="12">
                        <v-card>
                            <v-card-title>Administrar Asesorias Alumno</v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-form
                                        ref="formAgendaAsesoria"
                                        action
                                        @submit.prevent="submit"
                                    >
                                        <v-row align="center" justify="center">
                                            <v-col :cols="8">
                                                <v-autocomplete
                                                    :rules="[rules_AgendaAsesoria.requerid]"
                                                    label="materia"
                                                    :items="materias"
                                                    v-model="materia"
                                                ></v-autocomplete>
                                                <v-autocomplete
                                                    :rules="[rules_AgendaAsesoria.requerid]"
                                                    label="profesor"
                                                    :items="profesores"
                                                    v-model="profesor"
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
                                                @click="$refs.formAgendaAsesoria.resetValidation()"
                                                outlined
                                                color="yellow"
                                            >reset</v-btn>
                                        </v-row>
                                    </v-form>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col :cols="12">
                        <v-card>
                            <v-card-title>Administrar Asesorias</v-card-title>
                            <v-card-text>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-col>
            <v-col :cols="4">
                <v-row>
                    <v-col :cols="12">
                        <v-card>
                            <v-card-title>Administrar Asesorias</v-card-title>
                            <v-card-text>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo provident quisquam nostrum voluptatibus laboriosam fugit molestias itaque, ea earum repudiandae hic, aspernatur rem at vero nemo nesciunt tenetur enim necessitatibus!
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    data() {
        return {
            materias: ["materia1", "materia2", "materia3"],
            profesores: ["profesores1", "profesores2", "profesores3"],
            materia:"",
            profesor:"",
            tema:"",
            rules_AgendaAsesoria: {
                requerid: v => !!v || "campo requerido",
                maxCaracteres: v => (!!v && v.length <= 50) || "max 50 caracteres",
            }
        };
    },
    methods: {
        submit() {
            this.$refs.formAgendaAsesoria.validate();
        }
    },
    beforeMount:{
        setMaterias(){
            // axios.get()
            // .then(response => console.log(response))
            // .catch(error => console.log(error));
        },
    },
    watch: {
        materia(){
            // axios.get()
            // .then(response => console.log(response))
            // .catch(error => console.log(error));
        }
    },
};
</script>