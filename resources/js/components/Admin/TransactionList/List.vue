<script>
import BaseListing from "../../../mixins/BaseListing"
export default {
  mixins: [BaseListing],
  name: "List",
  data() {
    return {
      fields: [
        // A virtual column that doesn't exist in items
        {key: 'id', label: 'No', sortable: true, sortDirection: 'desc'},
        {key: 'user_name', label: 'User Name', sortable: true, sortDirection: 'desc'},
        {key: 'total_price', label: 'Price', sortable: true, sortDirection: 'desc'},
        {key: 'quantity', label: 'Quantity', sortable: true, sortDirection: 'desc'},
        {key: 'created_at', label: 'Date', sortable: true, sortDirection: 'desc'},

        {key: 'actions', label: 'Actions'}
      ],
      selected: 5,
      options: [
        {value: 5, text: '5'},
        {value: 10, text: '10'},
        {value: 20, text: '20'},
        {value: 30, text: '30'}
      ],
      default_role: ['super-admin']
    }
  }
}
</script>

