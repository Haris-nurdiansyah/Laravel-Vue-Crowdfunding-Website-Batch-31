<template>
    <v-card>
        <v-toolbar dark>
            <v-btn icon dark @click.native="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>

            <v-toolbar-title>
                Register
            </v-toolbar-title>
        </v-toolbar>

        <v-container fluid>
            <v-form ref="form" v-model="valid" lazy-validation>

                <v-text-field v-model="name" :rules="nameRules" label="Name" required append-icon="mdi-account-check" class="mb-2">
                </v-text-field>

                <v-text-field v-model="email" :rules="emailRules" label="E-mail" required append-icon="mdi-email">
                </v-text-field>

                <div class="text-xs-center mt-2">
                    <v-btn
                        color="grey darken-4 white--text"
                        :disabled="!valid"
                        @click="submit"
                    >Register
                    <v-icon right>mdi-signup</v-icon>
                    </v-btn>

                    <!-- <v-btn color="grey darken-4 white--text" @click="authProvider('google')">
                        Login With Google
                        <v-icon right>mdi-google</v-icon>
                    </v-btn> -->
                </div>

            </v-form>
        </v-container>

    </v-card>
</template>

<script>

    import { mapActions } from 'vuex'

    export default {
        name: 'login',
        data() {
            return {
                valid: true,
                email: '',
                emailRules: [
                    v => !!v || 'Email is required',
                    v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) || 'Email must be valid'
                ],
                name: '',
                nameRules: [
                    v => !!v || 'Name is required',
                ],
            }
        },
        methods: {
            ...mapActions({
                setAlert : 'alert/set'
            }),

            submit() {

                if (this.$refs.form.validate()) {

                    let formData = {
                        name : this.name,
                        email : this.email
                    }

                    axios.post('/api/register', formData)
                        .then(response => {

                            let { data } = response.data

                            if (data.user.id.length>0) {
                                this.setAlert({
                                    status : true,
                                    color : 'success',
                                    text : 'Register success, please verify your account'
                                })

                                this.$emit('registered', 'verification')

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

                            if (data.errors.email) {
                                this.setAlert({
                                    status: true,
                                    color: 'error',
                                    text: data.errors.email[0]
                                })
                            }

                            console.log(data.message);

                        })

                }

            },

            close () {
                this.$emit('closed', false)
            },
        },
    }

</script>
