<script>
export default {
    props: ['items'],
    data() {
        return {
            selected: null
        }
    },
    methods: {
        filter(payload) {
            this.$emit('filtered', payload)
        },
        reset() {
            this.selected = null;
            this.$parent.search_keyword = ''
        }
    }
}
</script>