<script>
export default {
  name: "ItemCreateForm",
  props: ['url'],
  created() {
    this.ItemCategory();
  },
  data() {
    return {
      selected: null,
      options: [],
      is_available: 0
    }
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
