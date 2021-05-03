<template>
    <div>
        <b-alert
            :show="dismissCountDown"
            dismissible
            :variant="status"
            @dismissed="dismissCountDown=0"
            @dismiss-count-down="countDownChanged"
        >
            {{ message }}
        </b-alert>
    </div>
</template>

<script>
export default {
    name: "AppFlashMessage",
    props: ['status', 'message'],
    data() {
        return {
            dismissSecs: 5,
            dismissCountDown: 0
        }
    },
    mounted() {
        this.dismissCountDown = this.dismissSecs
    },
    methods: {
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        }
    }
}
</script>

<style scoped>

</style>
