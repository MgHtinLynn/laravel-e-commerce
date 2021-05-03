<script>
import {mapGetters} from 'vuex'
import Vue from "vue";


export default {
  name: "CheckoutSuccess",
  props: ['url', 'url_transactions'],
  computed: {
    ...mapGetters(['items', 'total'])
  },
  created() {
    this.sendTransactionsList()
    Vue.nextTick(function () {
      window.localStorage.clear();
    })
    window.location.href = this.url
  },
  methods: {
    sendTransactionsList() {

      axios.post(this.url_transactions, {'items': this.items, 'total_price': this.total}).then(response => {
        console.log('hello')
        console.log(response.data)
      }).catch(err => {
        console.log(err)
        this.error = true
      });
    }
  }
}
</script>

<style scoped>

</style>
