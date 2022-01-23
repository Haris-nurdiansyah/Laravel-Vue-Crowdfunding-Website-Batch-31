<template>
    <div>

        <v-card v-if="campaign.id">
            <v-img
            height="250"
            :src="campaign.image"
            >
                 <v-card-title class="fill-height align-end white--text">{{ campaign.title }}</v-card-title>
            </v-img>


            <v-card-text>
                <v-simple-table dense>
                    <tbody>
                        <tr>
                            <td block><v-icon>mdi-home-city</v-icon> Alamat</td>
                            <td>{{ campaign.address }}</td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
                            <td class="blue--text">Rp. {{ campaign.collected.toLocaleString('id-ID') }}</td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-cash</v-icon> Dibutuhkan</td>
                            <td class="orange--text">Rp. {{ campaign.required.toLocaleString('id-ID') }}</td>
                        </tr>
                    </tbody>
                </v-simple-table>
                <hr>
                Description: <br>
                <p class="text-justify">
                    {{ campaign.description }}
                </p>
            </v-card-text>

            <v-card-actions>
                <v-btn block @click="donate" :disabled="campaign.collected > campaign.required" dark>
                    <v-icon>mdi-cash</v-icon>
                    DONATE
                </v-btn>
            </v-card-actions>
        </v-card>

    </div>
</template>

<script>
    import store from '../store'

    export default {
        data: () => ({
            campaign: {},
        }),
        store,
        created() {
            this.go()
        },
        methods: {
            go() {
                let { id } = this.$route.params
                let url = `/api/campaign/${id}`
                axios.get(url)
                    .then(res => {
                        let { data } = res.data;
                        this.campaign = data.campaign

                    })
                    .catch(err => {
                        let { responses } = err
                        console.log(responses);
                    })
            },
            donate() {
                this.$store.commit('increment')
            }
        },
    }
</script>
