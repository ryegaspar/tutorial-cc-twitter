<template>
    <div>
        <p class="text-gray-300 whitespace-pre-wrap">
            <component :is="body" />
        </p>
    </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        computed: {
            body() {
                return {
                    'template': `<div>${this.tweet.body}</div>`
                }
            }
        }
    }
</script>
