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
            <peticiones-component :id_profesor="id_profesor"></peticiones-component>
            <asesorias-component :id_profesor="id_profesor"></asesorias-component>
            <a @asesoriaAgendada="true"></a>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["id_profesor"],
    data() {
        return {};
    },
    methods: {},
    created() {},
    watch: {}
};
</script>