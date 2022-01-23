<template>
    <div>

        <v-container class="ma-0 pa-0" grid-list-sm>
            <v-subheader>
                All Campaigns
            </v-subheader>
            <v-layout wrap>
                <v-flex v-for="(campaign, index) in campaigns"  :key="`campaign-`+campaign.id" sm4 xs6>
                    <campaign-item :campaign="campaign"></campaign-item>
                </v-flex>
            </v-layout>
            <div class="text-center mt-4">
                <v-pagination
                v-model="page"
                @input="go"
                :length="lengthPage"
                :total-visible="6"
                ></v-pagination>
            </div>
        </v-container>

    </div>
</template>

<script>
    export default {
        data: () => ({
            campaigns: [],
            page: 0,
            lengthPage: 0,
        }),
        components: {
            CampaignItem: () => import('../components/CampaignItem'),
        },
        created() {
            this.go()
        },
        methods: {
            go() {
                let url = `api/campaign?page=${this.page}`
                axios.get(url)
                    .then(res => {

                        let { data } = res.data;
                        this.campaigns = data.campaigns.data
                        this.page = data.campaigns.current_page
                        this.lengthPage = data.campaigns.last_page

                    })
                    .catch(err => {
                        let { responses } = err
                        console.log(responses);
                    })
            }
        },
    }
</script>
