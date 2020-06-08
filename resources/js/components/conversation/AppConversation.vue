<template>
    <div>
        <div>
            parents
        </div>

        <div class="text-lg border-b-8 border-t-8 border-gray-800">
            <app-tweet :tweet="tweet(id)"
                       v-if="tweet(id)"
            />
        </div>

        <div>
            replies
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'

    export default {
        props: {
            id: {
                required: true,
                type: String
            },
        },

        computed: {
            ...mapGetters({
                tweet: 'conversation/tweet'
            })
        },

        mounted() {
            this.getTweets(`/api/tweets/${this.id}`)
        },

        methods: {
            ...mapActions({
                getTweets: 'conversation/getTweets'
            })
        }
    }
</script>
