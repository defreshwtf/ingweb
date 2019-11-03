<template>
    <div>
        <v-col md="4" offset-md="4">
            <v-card style="margin: 20vh 0;">
                <v-card-title>Login</v-card-title>
                <v-card-text>
                    <v-form>
                        <v-text-field label="email"></v-text-field>
                        <v-text-field label="password"></v-text-field>
                        <v-col md="6" offset-md="3">
                            <v-checkbox label="Remember Me"></v-checkbox>
                        </v-col>
                        <v-row>
                            <v-col offset-md="2">
                                <v-btn type="submit" outlined>Login</v-btn>
                            </v-col>
                            <v-col>
                                <v-btn x-small color="red" text>Forgot your password???</v-btn>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>

                        <v-row>
                            <v-col md="3" offset-md="3">
                                <v-btn text disabled>not account???</v-btn>
                            </v-col>
                            <v-col md="6">
                                <v-btn text color="green"> Register</v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>
    </div>
</template>

<script>
export default {
    data () {
      return {
      }
    },
};
</script>