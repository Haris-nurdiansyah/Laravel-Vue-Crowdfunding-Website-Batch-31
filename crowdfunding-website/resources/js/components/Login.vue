<template>
     <v-card>
        <v-toolbar dark>
            <v-btn icon dark @click.native="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>

            <v-toolbar-title> <v-icon left>mdi-lock</v-icon>Login</v-toolbar-title>
        </v-toolbar>

        <v-divider></v-divider>

        <v-container fluid>
            <v-form ref="form" v-model="valid" lazy-validation>
                <v-text-field v-model="email" :rules="emailRules" label="E-mail" required append-icon="mdi-email">
                </v-text-field>

                <v-text-field
                    v-model="password"
                    :rules="passwordRules"
                    label="Password"
                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="showPassword ? 'text' : 'password'"
                    hint="At laeast 6 characters"
                    counter
                    @click:append="showPassword = !showPassword"
                ></v-text-field>

                <div class="text-xs-center mt-2">
                    <v-btn
                        color="grey darken-4 white--text"
                        :disabled="!valid"
                        @click="submit"
                    >Login
                    <v-icon right>mdi-login</v-icon>
                    </v-btn>

                    <v-btn color="grey darken-4 white--text" @click="authProvider('google')">
                        Login With Google
                        <v-icon right>mdi-google</v-icon>
                    </v-btn>
                </div>

            </v-form>
        </v-container>
    </v-card>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

    export default {
        name: 'login',
        data() {
            return {
                valid: true,
                email: 'example@example.com',
                emailRules: [
                    v => !!v || 'Email is required',
                    v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) || 'Email must be valid'
                ],
                showPassword: false,
                password: '',
                passwordRules: [
                    v => !!v || 'Password is required',
                    v => (v && v.length >= 6) || 'Min 6 chaacters'
                ],
            }
        },
        computed: {
            ...mapGetters({
                user : 'auth/user'
            })
        },
        methods: {
            ...mapActions({
                setAuth : 'auth/set',
                setAlert : 'alert/set'
            }),

            submit () {

                if (this.$refs.form.validate()) {

                    let formData = {
                        'email' : this.email,
                        'password' : this.password
                    }
                    axios.post('api/login/', formData)
                        .then(response => {
                            let { data } = response.data
                            console.log(data)
                            this.setAuth(data)

                            if (this.user.user.id.length>0) {
                                this.setAlert({
                                    status : true,
                                    color : 'success',
                                    text : 'Login Success'
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
                            let  responses  = error.response

                            this.setAlert({
                                status : true,
                                color : 'success',
                                text : responses.data.response_message
                            })
                        })

                }
            },

            close () {
                this.$emit('closed', false)
            },

            authProvider (provider) {
                let url = `/api/auth/social/${provider}`

                axios.get(url)
                    .then(response => {
                        let { data } = response
                        window.location.href = data.url
                    })
                    .catch(error => {
                        this.setAlert({
                            status : true,
                            color: 'error',
                            text: 'Login failed'
                        })
                    })
            }
        },
    }

</script>
