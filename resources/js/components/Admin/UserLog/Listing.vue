<script>
import BaseListing from "../../../mixins/BaseListing"

export default {
    mixins: [BaseListing],
    name: "AdminUserLogListing",
    data() {
        return {
            fields: [
                // A virtual column that doesn't exist in items
                {key: 'id', label: 'No', sortable: true, sortDirection: 'desc'},
                {key: 'date', label: 'DateTime', sortable: true},
                {key: 'display_name', label: 'User Name', sortable: true, sortDirection: 'desc'},
                {key: 'name', label: 'File Name', sortable: true, sortDirection: 'desc'},
                {key: 'api_send_complete', label: 'Sending Status'},
                {key: 'status', label: 'Completion Status'},
                {key: 'dr_file_path', label: 'Disbursement Report'},
                {key: 'ri_file_path', label: 'Remittances Instruction'},
                {key: 'fail_file_path', label: 'Fail Report'}
            ],
            selected: 5,
            options: [
                {value: 5, text: '5'},
                {value: 10, text: '10'},
                {value: 20, text: '20'},
                {value: 30, text: '30'}
            ],
            filters: [
                {value: 'pending', text: 'Pending'},
                {value: 'partially-success', text: 'Partially Success'},
                {value: 'success', text: 'Success'},
                {value: 'fail', text: 'Fail'},

            ],
            default_role: ['super-admin']
        }
    }
}
</script>

