<template>
    <div>
        <div>
            <app-tweet v-if="parents(id)"
                       v-for="t in parents(id)"
                       :tweet="t"
                       :key="t.id"
            />
        </div>

        <div class="text-lg border-b-8 border-t-8 border-gray-800">
            <app-tweet :tweet="tweet(id)"
                       v-if="tweet(id)"
            />
        </div>

        <div>
            <app-tweet v-if="replies(id)"
                       v-for="t in replies(id)"
                       :tweet="t"
                       :key="t.id"
            />
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
                tweet: 'conversation/tweet',
                parents: 'conversation/parents',
                replies: 'conversation/replies',
            })
        },

        mounted() {
            this.getTweets(`/api/tweets/${this.id}`)
            this.getTweets(`/api/tweets/${this.id}/replies`)
        },

        methods: {
            ...mapActions({
                getTweets: 'conversation/getTweets',
            })
        }
    }
</script>
