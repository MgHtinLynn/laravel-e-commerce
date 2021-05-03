<template>
    <b-row class="justify-content-center py-10">
        <b-col>
            <h3><slot name="title"></slot></h3>
            <p>
                <slot name="description"></slot>
            </p>
        </b-col>
        <b-col>
            <b-card>
                <slot name="card"></slot>
            </b-card>
        </b-col>
    </b-row>

</template>

<script>
export default {
    name: "AppFormSection",
}
</script>

<style scoped>

</style>
