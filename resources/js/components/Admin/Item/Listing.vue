<script>
import BaseListing from "../../../mixins/BaseListing"
export default {
    mixins: [BaseListing],
    name: "Listing",
    data() {
        return {
            fields: [
                // A virtual column that doesn't exist in items
                {key: 'id', label: 'No', sortable: true, sortDirection: 'desc'},
                {key: 'name', label: 'Name', sortable: true, sortDirection: 'desc'},
                {key: 'price', label: 'Price', sortable: true, sortDirection: 'desc'},
                {key: 'item_model', label: 'Item Model', sortable: true},
                {key: 'category_name', label: 'Company Name', sortable: true},
                {key: 'is_available', label: 'Available', sortable: true},
                {key: 'actions', label: 'Actions'}
            ],
            selected: 5,
            options: [
                {value: 5, text: '5'},
                {value: 10, text: '10'},
                {value: 20, text: '20'},
                {value: 30, text: '30'}
            ]
        }
    }
}
</script>

