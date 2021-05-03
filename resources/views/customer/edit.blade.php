@extends('layouts.app')

@section('content')
    <b-container>
        <customer-edit-form :customer="{{ $customer }}" inline-template>
            <form action="{{ route('customer-list.update',$customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <app-form-section>
                    <template #title>Update Customer Information</template>
                    <template #description>Update Customer account's Details.</template>
                    <template #card>

                        <b-form-group id="input-group-name" label="Your Name:" label-for="input-name">
                            <b-form-input
                                id="input-name"
                                name="name"
                                v-model="form.name"
                                required
                                placeholder="Enter name"
                                class="@error('name') is-invalid @enderror"
                            ></b-form-input>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
                                name="email"
                                required
                                v-model="form.email"
                                placeholder="Enter email"
                                class="@error('email') is-invalid @enderror"
                            ></b-form-input>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                            id="input-group-phone"
                            label="Phone:"
                            label-for="input-phone"
                        >
                            <b-form-input
                                    id="input-phone"
                                    name="phone"
                                    required
                                    v-model="form.phone"
                                    placeholder="Enter Phone"
                                    class="@error('phone') is-invalid @enderror"
                            ></b-form-input>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-address"
                                label="Address:"
                                label-for="input-address"
                        >

                            <b-form-textarea
                                    id="textarea"
                                    name="address"
                                    v-model="form.address"
                                    placeholder="Enter Address..."
                                    rows="3"
                                    max-rows="6"
                            ></b-form-textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>



                        <b-button type="submit" size="lg" block variant="primary">Update</b-button>
                    </template>
                </app-form-section>
            </form>
        </customer-edit-form>
    </b-container>
@endsection
