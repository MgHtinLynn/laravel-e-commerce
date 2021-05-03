@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <item-list :url="`{{ route('home') }}`" inline-template>
            <div>
                <spinner v-if="isBusy" class="mt-10"></spinner>
                <b-row align-h="start" v-cloak>

                    <b-col md="6" lg="4" v-for="item in items" :key="item.id">
                        <b-card
                                :title="item.name"
                                :img-src="item.image_url"
                                img-alt="Image"
                                img-top
                                tag="article"
                                style="max-width: 20rem;"
                                class="mb-2"
                        >
                            <b-card-text>
                                $@{{ item.price }}
                            </b-card-text>

                            <b-button @click="addToCart(item)" variant="primary">Add To Cart</b-button>
                        </b-card>
                    </b-col>
                </b-row>
            </div>

        </item-list>
    </div>
@endsection
