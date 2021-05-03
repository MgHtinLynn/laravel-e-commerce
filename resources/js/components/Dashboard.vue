<script>
export default {
    name: "Dashboard",
    data() {
        return {
            disbursementReport: null,
            remittanceInstruction: null,
            dRError : {
                count: 0,
                message: 'File size should not be greater than 2MB.'
            },
            rIError: {
                count: 0,
                message: 'File size should not be greater than 2MB.'
            }
        }
    },
    methods: {
        cleardisbursementReport() {
            this.$refs['file-input-disbursement-report'].reset()
            this.dRError.count = 0
        },
        clearremittanceInstruction() {
            this.$refs['file-input-remittance-instruction'].reset()
            this.rIError.count = 0
        },
        validateFileSizeDR(el) {
            let file = (el.target.files || el.dataTransfer.files)[0];
            if (!file) {
                return;
            }

            if (file.size > 2097152) {
                this.dRError.count++;
                el.target.classList.add('is-invalid');
                el.target.classList.add('invalid-state');
            } else {
                if (this.dRError.count && el.target.classList.contains('invalid-state')) {
                    this.dRError.count--;
                }
                el.target.classList.remove('is-invalid');
            }
        },
        validateFileSizeRI(el) {
            let file = (el.target.files || el.dataTransfer.files)[0];
            if (!file) {
                return;
            }

            if (file.size > 2097152) {
                this.rIError.count++;
                el.target.classList.add('is-invalid');
                el.target.classList.add('invalid-state');
            } else {
                if (this.rIError.count && el.target.classList.contains('invalid-state')) {
                    this.rIError.count--;
                }
                el.target.classList.remove('is-invalid');
            }
        }
    },
    computed: {
        disabled: function () {
            return this.dRError.count > 0 || this.rIError.count > 0
        }
    }
}
</script>

<style scoped>

</style>
