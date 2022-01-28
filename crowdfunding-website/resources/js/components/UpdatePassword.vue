<template>
    <v-card>
        <v-toolbar dark>
            <v-btn icon dark @click.native="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>

            <v-toolbar-title>
                Update Password
            </v-toolbar-title>
        </v-toolbar>

        <v-container fluid>
            <v-form ref="form">

                <v-text-field v-model="email" label="E-Mail" required append-icon="mdi-email" class="mb-2 mt-1">
                </v-text-field>

                <v-text-field type="password" v-model="password" label="password" required append-icon="mdi-lock" class="mb-2 mt-1">
                </v-text-field>

                <v-text-field type="password" v-model="password_confirmation" label="Password Confirm" required append-icon="mdi-lock" class="mb-2 mt-1">
                </v-text-field>

                <div class="text-xs-center mt-2">
                    <v-btn
                        color="grey darken-4 white--text"
                        @click="submit"
                    >Update
                    </v-btn>
                </div>

            </v-form>

            <v-snackbar
                v-model="alertStatus"
                multi-line
                timeout="4000"
                buttom
                color="error"
                >

                <div v-for="(error,i) in errors" :key="i">
                    <li>{{ error }}</li>
                </div>

                <template v-slot:action="{ attrs }">
                    <v-btn
                    color="white"
                    text
                    v-bind="attrs"
                    @click="alertStatus = !alertStatus"
                    >
                    Close
                    </v-btn>
                </template>
            </v-snackbar>
        </v-container>

    </v-card>
</template>

<script>

    import { mapActions } from 'vuex'

    export default {
        name: 'updatePassword',
        data() {
            return {
                email: '',
                password: '',
                password_confirmation: '',
                errors: [],
                alertStatus: false,
            }
        },
        methods: {
            close () {
                this.$emit('closed', false)
            },

            ...mapActions({
                setAlert: 'alert/set'
            }),

            submit () {

                let formData = {
                    email : this.email,
                    password : this.password,
                    password_confirmation : this.password_confirmation,
                }

                axios.post('/api/update-password', formData)
                    .then(response => {

                        let { data } = response.data

                         if (data.user.id.length>0) {

                                this.setAlert({
                                    status : true,
                                    color : 'success',
                                    text : 'Your password was updated, please login'
                                })

                                this.close()

                            } else {
                                this.setAlert({
                                    status : true,
                                    color : 'error',
                                    text : 'Login Filed'
                                })
                            }

                    })
                    .catch(error => {

                        let { data } = error.response

                        if (data) {

                            if (data.errors) {
                                const errors = Object.values(data.errors)

                                let errorMessages = errors.map(item => {
                                    return item[0]
                                });

                                this.errors = errorMessages;
                                this.alertStatus = true

                            }else {
                                this.setAlert({
                                    status: true,
                                    color: 'error',
                                    text: data.response_message
                                })
                            }

                        }

                        console.log(response);

                    })

            }
        },
    }

</script>
