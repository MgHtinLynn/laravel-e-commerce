<script>
export default {
    name: "CustomerEditForm",
    props: ['customer', 'url'],
    created() {
        //this.getRoles();
    },
    data() {
        return {
            //selected: this.customer.roles[0].name,
            options: [],
            form: {
                name: this.customer.name,
                email: this.customer.email,
                phone: this.customer.phone,
                address: this.customer.address,
            }
        }
    },
    mounted() {

    },
    methods: {

    }
}
</script>

<style scoped>

</style>
