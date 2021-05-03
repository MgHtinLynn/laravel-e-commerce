<template>
    <div>
        <b-alert class="mt-3" variant="success" :show="dismissCountDown" @dismissed="dismissCountDown=0"
                 @dismiss-count-down="countDownChanged" dismissible>Success
        </b-alert>
        <app-form-section>
            <template #title>Profile Information</template>
            <template #description>Update your account's profile information and email address.</template>
            <template #card>
                <b-form-group id="input-group-name" label="Your Name:" label-for="input-name">
                    <b-form-input
                        id="input-name"
                        v-model="form.display_name"
                        required
                        placeholder="Enter name"
                    ></b-form-input>
                    <app-input-error :message="errorMessageName" class="mt-2"/>
                </b-form-group>

                <b-form-group
                    id="input-group-email"
                    label="Email address:"
                    label-for="input-email"
                    description="We'll never share your email with anyone else."
                >
                    <b-form-input
                        id="input-email"
                        type="email"
                        v-model="form.email"
                        required
                        placeholder="Enter email"
                    ></b-form-input>
                    <app-input-error :message="errorMessageEmail" class="mt-2"/>

                </b-form-group>
                <b-button variant="primary" @click="updateProfileInformation">Update</b-button>
            </template>
        </app-form-section>
    </div>
</template>

<script>
import AppFormSection from "../Utilities/AppFormSection";
import AppInputError from "../Utilities/AppInputError";

export default {
    name: "Profile",
    props: ['display_name', 'email', 'url'],
    components: {
        AppFormSection,
        AppInputError
    },
    data() {
        return {
            form: {
                display_name: this.display_name,
                email: this.email
            },
            dismissSecs: 5,
            dismissCountDown: 0,
            errors: null
        }
    },
    methods: {
        updateProfileInformation() {
            axios.put(this.url,this.form).then(response => {
                this.dismissCountDown = this.dismissSecs
            }).catch(res => {
                if (res.response.status === 422) {
                    this.errors = res.response.data.errors;
                }
            })
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        }
    },
    computed: {
        errorMessageName() {
            return this.errors ? this.errors.name ? this.errors.name[0] : null : null
        },
        errorMessageEmail() {
            return this.errors ? this.errors.email ? this.errors.email[0] : null : null
        }
    }
}
</script>

<style scoped>

</style>
