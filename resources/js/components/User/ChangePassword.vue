<template>
    <div>
        <b-alert class="mt-3" variant="success" :show="dismissCountDown" @dismissed="dismissCountDown=0"
                 @dismiss-count-down="countDownChanged" dismissible>Success
        </b-alert>

        <app-form-section>
            <template #title>Change Password</template>
            <template #description>Ensure your account is using a long, random password to stay secure.</template>
            <template #card>
                <b-form-group id="input-group-old-password" label="Current Password:" label-for="input-old-password">
                    <b-form-input
                        id="input-old-password"
                        v-model="form.current_password"
                        type="password"
                        required
                        placeholder="Old Password"
                    ></b-form-input>
                    <app-input-error :message="currentPasswordErrorMsg" class="mt-2"/>
                </b-form-group>

                <b-form-group
                    id="input-group-new-password"
                    label="New Password:"
                    label-for="input-1"
                >
                    <b-form-input
                        id="input-new-password"
                        type="password"
                        v-model="form.password"
                        required
                        placeholder="New Password"
                    ></b-form-input>
                    <app-input-error :message="passwordErrorMsg" class="mt-2"/>
                </b-form-group>

                <b-form-group
                    id="input-group-confirm-password"
                    label="Confirm Password:"
                    label-for="input-confirm-password"
                >
                    <b-form-input
                        id="input-confirm-password"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                        placeholder="Confirm New Password"
                    ></b-form-input>
                </b-form-group>

                <b-button variant="primary" @click="updatePassword">Change Password</b-button>
            </template>
        </app-form-section>
    </div>
</template>

<script>

import AppFormSection from "../Utilities/AppFormSection";
import AppInputError from "../Utilities/AppInputError";

export default {
    name: "ChangePassword",
    components: {
        AppFormSection,
        AppInputError
    },
    props: ['url'],
    data() {
        return {
            form: {
                current_password: '',
                password: '',
                password_confirmation: '',
            },
            dismissSecs: 5,
            dismissCountDown: 0,
            errors: null
        }
    },
    methods: {
        updatePassword() {
            axios.put(this.url, this.form).then(response => {
                this.dismissCountDown = this.dismissSecs
                this.clearValue()
                this.errors = null
            }).catch(res => {
                if (res.response.status === 422) {
                    this.errors = res.response.data.errors;
                }
                this.clearValue()
            })
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        clearValue() {
            this.form.current_password = ''
            this.form.password = ''
            this.form.password_confirmation = ''
        }
    },
    computed: {
        currentPasswordErrorMsg() {
            return this.errors ? this.errors.current_password ? this.errors.current_password[0] : null : null
        },
        passwordErrorMsg() {
            return this.errors ? this.errors.password ? this.errors.password[0] : null : null
        }
    }
}
</script>

<style scoped>

</style>
