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
                {key: 'email', label: 'Email', sortable: true, sortDirection: 'desc'},
                {key: 'phone', label: 'Phone', sortable: true},
                {key: 'address', label: 'Address', sortable: true},
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

