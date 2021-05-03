<script>

export default {
  props: ['url'],
  name: "ItemList",
  data() {
    return {
      items: null,
      isBusy: false,
    }
  },
  created() {
    //getting results from item list api
    this.getResults();
  },
  methods: {
    getResults() {
      this.isBusy = true
      axios.get(this.url).then(response => {
        this.isBusy = false
        this.items = response.data;
      });
    },
    addToCart(item) {
      // assign custom value to add in vuex
      let addToCartItem = {
        'id': item.id,
        'name': item.name,
        'price': item.price,
        'original_price': item.price,
        'quantity': 1,
        'category_name': item.category.name,
        'image': item.image_url
      }
      // dispatch the action with payload to vuex
      this.$store.dispatch('addItem', addToCartItem)
    }
  }
}
</script>

<style lang="scss" scoped>
.card-img, .card-img-top {
  min-height: 320px;
  min-width: 3;
}
</style>
