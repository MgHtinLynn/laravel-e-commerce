<script>
export default {
    props: ['url'],
    created() {
        this.getResults();
    },
    watch: {
        search_keyword(newKeyword, oldKeyword) {
            if (newKeyword.length === 0) {
                this.getResults()
            }
        }
    },
    data() {
        return {
            items: null,
            pagination: [],
            fields: [],
            search_keyword: '',
            filter_keyword: '',
            isBusy: false,
            isResourceCollection: true
        }
    },
    methods: {
        setPagination(response) {
            this.pagination = this.isResourceCollection ? response.data.meta : response.data;
        },
		getResults(page = 1) {

            this.isBusy = true

            let params = {
                page,
                per_page: this.selected,
                search: this.search_keyword,
                filter: this.filter_keyword
            }

			axios.get(this.url, {params}).then(response => {
                this.isBusy = false
                this.items = response.data.data;
                this.setPagination(response);
            });
        },
        filter(payload) {
            this.filter_keyword = payload;
            this.getResults();
        }
	}
}
</script>

<style scoped>
    input[type="search"]::-webkit-search-cancel-button {
        -webkit-appearance: searchfield-cancel-button;
    }
</style>
