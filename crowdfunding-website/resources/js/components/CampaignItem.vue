<template>
    <div>

        <v-card :to="'campaign/' + campaign.id">

            <v-img :src="campaign.image" class="white--text" style="height:calc(8rem + 11vw);">
                <v-card-title class="fill-height align-end" v-text="campaign.title">
                </v-card-title>
            </v-img>

            <v-card-actions>
                <v-progress-linear
                    v-model="progress"
                    height="20"
                    color="blue-grey"
                    striped
                >
                <template v-slot:default="{ value }">
                    <strong class="white--text">{{ Math.ceil(value) }}%</strong>
                </template>
                </v-progress-linear>
            </v-card-actions>

            <v-card-actions>
                <v-icon>md-cash</v-icon>
                <span> Rp {{ campaign.collected.toLocaleString('id-ID') }} </span>
                <v-spacer></v-spacer>
                <span> {{ Math.ceil(progress) }}% </span>
            </v-card-actions>

        </v-card>

    </div>
</template>
<script>
export default {
    name: 'campaign-item',
    props: ['campaign'],
    computed: {
        progress () {
            return (this.campaign.collected / this.campaign.required * 100)
        },
    }
}
</script>
