<template>
    <v-card>
            <v-toolbar dark>
                <v-btn icon dark @click.native="close">
                    <v-icon>mdi-close</v-icon>
                </v-btn>

                <v-text-field
                    hide-details
                    append-icon="mdi-microphone"
                    flat
                    autofocus
                    label="Search"
                    prepend-inner-icon="mdi-magnify"
                    v-model="keyword"
                    @input="doSearch"
                >
                </v-text-field>
            </v-toolbar>

            <v-card-text>
                <v-subheader class="ma-0 pa-0" v-if="keyword.length > 0">
                    Result search "{{ keyword }}"
                </v-subheader>

                <v-alert
                    :value="campaigns.length==0 && keyword.length>0"
                    color="red"
                    class="white--text"
                >
                    Sorry, but not result found
                </v-alert>

                <!-- Hasil pencarian  -->
                <v-row justify="center" v-if="keyword.length > 0">
                    <v-container class="mt-2 pa-0" grid-list-sm>
                        <v-layout wrap>
                            <v-flex v-for="campaign in campaigns" :key="`campaign-` + campaign.id" sm4 xs6>
                                <campaign-item :campaign="campaign" @click.native="close"/>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-row>
            </v-card-text>
    </v-card>
</template>

<script>

    export default {
        name: 'search',
        components: {
            campaignItem: () => import('./CampaignItem.vue')
        },
        data() {
            return {
                keyword: '',
                campaigns: [],
            }
        },
        methods: {
            doSearch() {

                let keyword = this.keyword

                if (keyword.length > 0) {

                    let url = `/api/campaign/search/${keyword}`
                    axios.get(url)
                        .then(response => {
                            let { data } = response.data
                            this.campaigns = data.campaigns
                            console.log(this.campaigns);
                        })
                        .catch(err => {
                            console.log(err);
                        })

                }else {
                    this.campaigns = []
                }

            },

            close() {
                this.$emit('closed', false)
            }
        },
    }

</script>


