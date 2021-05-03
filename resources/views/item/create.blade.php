@extends('layouts.app')

@section('content')
    <b-container>
        <item-create-form inline-template :url="`{{ route('category.list') }}`">
            <form action="{{ route('item-list.store') }}" method="POST">
                @csrf
                <app-form-section>
                    <template #title>Create Item Information</template>
                    <template #description>Create Item's Detail.</template>
                    <template #card>

                        <b-form-group id="input-group-name" label="Item Name:" label-for="input-name">
                            <b-form-input
                                    id="input-name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    placeholder="Enter Item name"
                                    class="@error('name') is-invalid @enderror"
                            ></b-form-input>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-price"
                                label="Item Price: USD"
                                label-for="input-price"
                        >
                            <b-form-input
                                    id="input-price"
                                    name="price"
                                    type="number"
                                    required
                                    value="{{ old('price') }}"
                                    placeholder="Enter price"
                                    class="@error('email') is-invalid @enderror"
                            ></b-form-input>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-item-model"
                                label="Item Model:"
                                label-for="input-item-model"
                        >
                            <b-form-input
                                    id="input-item-model"
                                    name="item_model"
                                    required
                                    value="{{ old('item_model') }}"
                                    placeholder="Enter Item Model"
                                    class="@error('item_model') is-invalid @enderror"
                            ></b-form-input>


                            @error('item_model')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-category"
                                label="Image URL:"
                                label-for="input-category"
                                description="only accept image url (cdn link) in dev mode"
                        >

                            <b-form-input
                                    id="input-image-url"
                                    name="image_url"
                                    required
                                    value="{{ old('image_url') }}"
                                    placeholder="Enter Image URL"
                                    class="@error('image_url') is-invalid @enderror"
                            ></b-form-input>

                            @error('image_url')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-category"
                                label="Company Name:"
                                label-for="input-category"
                        >

                            <b-form-select v-model="selected" :options="options" name="category_id" required
                                           class="@error('role') is-invalid @enderror">
                                <template #first>
                                    <b-form-select-option :value="null" disabled>-- Please select an role --
                                    </b-form-select-option>
                                </template>

                            </b-form-select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-item-description"
                                label="Item Description:"
                                label-for="input-item-description"
                        >

                            <b-form-textarea
                                    id="textarea"
                                    name="description"
                                    placeholder="Enter Item Description..."
                                    rows="3"
                                    max-rows="6"
                                    class="@error('image-url') is-invalid @enderror"
                            ></b-form-textarea>



                            @error('item-description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-form-group
                                id="input-group-is-available"
                                label="Available For Store:"
                                label-for="checkbox-is-available"
                        >

                            <b-form-checkbox
                                    id="checkbox-is-available"
                                    v-model="is_available"
                                    name="is_available"
                                    :value="1"
                                    :unchecked-value="0"
                            >
                                Available
                            </b-form-checkbox>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </b-form-group>

                        <b-button type="submit" variant="primary">Create</b-button>
                    </template>
                </app-form-section>
            </form>
        </item-create-form>
    </b-container>
@endsection
