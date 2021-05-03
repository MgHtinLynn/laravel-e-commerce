<script>
import {mapGetters} from 'vuex'

export default {
  name: "AddToCart",
  computed: {
    ...mapGetters(['count'])
  }
}
</script>

<style lang="scss" scoped>
.ml-mini-cart {
  .fas {
    font-size: xxx-large;
  }

  .total-count {
    top: 15px;
    position: absolute;
  }
}

</style>
