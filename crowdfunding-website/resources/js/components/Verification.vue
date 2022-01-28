<template>
    <v-card>
        <v-toolbar dark>
            <v-btn icon dark @click.native="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>

            <v-toolbar-title>
                <v-icon left>mdi-lock</v-icon>
                Verification
            </v-toolbar-title>
        </v-toolbar>

        <v-container fluid>
            <v-form ref="form" v-model="valid" lazy-validation>

                <v-text-field type="number" v-model="otp" :rules="otpRules" label="Otp Code" required append-icon="mdi-xml" class="mb-2 mt-1">
                </v-text-field>

                <div class="text-xs-center mt-2">
                    <v-btn
                        color="grey darken-4 white--text"
                        :disabled="!valid"
                        @click="submit"
                    >Verification
                    </v-btn>
                </div>

            </v-form>
        </v-container>

    </v-card>
</template>

<script>

    import { mapActions } from 'vuex'

    export default {
        name: 'verification',
        data() {
            return {
                valid: true,
                otp: '',
                otpRules: [
                    v => !!v || 'Otp code is required',
                    v => (v && v.length >= 6) || 'OTP code at least 6 digits'
                ],
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

                if (this.$refs.form.validate()) {

                    let formData = {
                        otp : this.otp,
                    }

                    axios.post('/api/verification', formData)
                        .then(response => {

                            let { data } = response.data

                            console.log(data);

                            if (data.user.id.length>0) {
                                this.setAlert({
                                    status : true,
                                    color : 'success',
                                    text : 'Verification success, please update your password'
                                })
                                this.$emit('registered', 'update-password')
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
                                this.setAlert({
                                    status: true,
                                    color: 'error',
                                    text: data.response_message
                                })
                            }

                            console.log(data);

                        })

                }

            }
        },
    }

</script>
