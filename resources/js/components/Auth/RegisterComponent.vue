<template>
    <div>
        <v-col md="4" offset-md="4">
            <v-card style="margin: 20vh 0;">
                <v-card-title>Register</v-card-title>
                <v-card-text>
                    <v-form>
                        <v-text-field label="name"></v-text-field>
                        <v-text-field label="email"></v-text-field>
                        <v-text-field label="password"></v-text-field>
                        <v-text-field label="confirm password"></v-text-field>
                        <v-select :items="itemsTipoUsuario" label="tipo Usuario" data-app></v-select>
                        <v-col md="5" offset-md="4">
                            <v-btn type="submit">Register</v-btn>
                        </v-col>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
    </div>
</template>

<script>
export default {
    data() {
        return {
            itemsTipoUsuario:["Profesor","Alumno"],
        }
    },
};
</script>