<script>
import {mapGetters} from 'vuex'
import Vue from 'vue'
import {StripeCheckout} from '@vue-stripe/vue-stripe';

export default {
  name: "Checkout",
  props: ['publishableKey', 'url'],
  components: {
    StripeCheckout,
  },

  computed: {
    ...mapGetters(['items', 'total'])
  },
  data() {
    return {
      fields: [
        // A virtual column that doesn't exist in items
        {key: 'no', label: 'No', sortable: true, sortDirection: 'desc'},
        {key: 'name', label: 'Name', sortable: true, sortDirection: 'desc'},
        {key: 'category_name', label: 'Company Name', sortable: true},
        {key: 'quantity', label: 'Quantity', sortable: true},
        {key: 'price', label: 'Price', sortable: true, sortDirection: 'desc'},
        {key: 'actions', label: 'Actions'}
      ],
      isBusy: false,
      sessionId: null,
      error: false

    }
  },
  methods: {
    increment(itemId) {
      this.$store.dispatch('increment', itemId)
    },
    decrement(itemId) {
      this.$store.dispatch('decrement', itemId)
    },
    deleteItem(itemId) {
      this.$store.dispatch('delete', itemId)
    },
    deleteAll() {
      this.isBusy = true
      Vue.nextTick(function () {
        window.localStorage.clear();
      })
      location.reload()
      this.isBusy = false
    },
    checkout() {
      let products = []
      this.items.map((function (item) {
        let price_data = {
          'currency': 'usd',
          'unit_amount': item.price * 100,
          'product_data': {
            'name': item.name,
            'images': [item.image]
          }
        }
        products.push({'price_data': price_data, 'quantity': item.quantity})
      }))


      axios.post(this.url, {products}).then(response => {
        this.sessionId = response.data.id;
        this.$refs.checkoutRef.redirectToCheckout();
      }).catch(err => {
          console.log(err)
          this.error = true
      });
    }
  }
}
</script>

<style lang="scss" scoped>
.a-click {
  cursor: pointer;
}

</style>
