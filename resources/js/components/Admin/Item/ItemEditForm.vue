<script>
export default {
    name: "ItemEditForm",
    props: ['item', 'url'],
    created() {
      this.ItemCategory();
    },
    data() {
        return {
            selected: this.item.category_id,
            options: [],
            form: this.item
        }
    },
    mounted() {

    },
    methods: {
      ItemCategory() {
        // let options =
        axios.get(this.url).then(response => {
          this.options = response.data.data;
        });
      }
    }
}
</script>

<style scoped>

</style>
