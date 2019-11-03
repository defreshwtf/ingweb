<template>
    <div>
        <v-card class="mx-auto" color="#5a9299" dark max-width="80vw" style="margin: 20vh 0">
            <v-card-title>
                <span class="title font-weight-light">{{app_name}}</span>
            </v-card-title>

            <v-card-text class="headline font-weight-bold">
                <v-carousel :show-arrows="false" :hide-delimiters="false" :cycle="true">
                    <v-carousel-item v-for="(ruta) in imgRutas" :key="ruta">
                        <v-row align="center" justify="center">
                            <v-img :src="ruta"></v-img>
                        </v-row>
                    </v-carousel-item>
                </v-carousel>
            </v-card-text>

            <v-card-actions>
                <v-list-item class="grow">
                    <v-list-item-avatar color="grey darken-3">
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title>{{app_name}}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    props: ["app_name"],
    data() {
        return {
            imgRutas:[
                "https://picsum.photos/id/11/500/300",
                "https://picsum.photos/id/11/500/300",
                "https://picsum.photos/id/11/500/300",
                "https://picsum.photos/id/11/500/300",
                "https://picsum.photos/id/11/500/300",
            ]
        };
    }
};
</script>