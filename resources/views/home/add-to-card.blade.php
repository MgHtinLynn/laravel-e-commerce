@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <checkout inline-template :publishable-key="`{{ config('stripe.publishableKey') }}`"
                  :url="`{{ route('create-checkout-session') }}`">
            <div>


                <app-flash-message :status="`danger`" v-if="error"
                                   :message="`Something Wrong! Please Try Again`"></app-flash-message>
                <b-row>
                    <b-col>
                        <h3>Your Cart List</h3>
                    </b-col>
                    <spinner v-if="isBusy" class="mt-10"></spinner>
                    <b-col class="text-right mb-3" v-if="!isBusy">
                        <a @click="deleteAll" class="btn btn-md btn-primary px-4 py-2 rounded-pill">Delete All </a>

                    </b-col>

                    <b-table striped hover :items="items" :fields="fields" busy.sync="isBusy" v-if="!isBusy" v-cloak>
                        <template #cell(no)="row">
                            @{{ row.index + 1 }}
                        </template>

                        <template #cell(quantity)="row">


                            <a @click="decrement(row.item.id)" class="mr-3 a-click">
                                <i class="fas fa-minus"></i>
                            </a>

                            @{{ row.item.quantity }}

                            <a @click="increment(row.item.id)" class="ml-3 a-click">
                                <i class="fas fa-plus"></i>
                            </a>


                        </template>

                        <template #cell(price)="row">
                            $@{{ row.item.price }}
                        </template>

                        <template #cell(actions)="row">
                            <a @click="deleteItem(row.item.id)" class="ml-3 a-click">
                                <i class="fas fa-trash"></i>
                            </a>
                        </template>

                    </b-table>

                    <b-col v-cloak>
                        Total: $@{{ total }}
                    </b-col>

                    <stripe-checkout
                            ref="checkoutRef"
                            :pk="publishableKey"
                            :session-id="sessionId"
                    ></stripe-checkout>

                    <b-col class="text-right mb-3" v-if="!isBusy">
                        <a @click="checkout" class="btn btn-md btn-primary px-4 py-2 rounded-pill">Checkout</a>
                    </b-col>
                </b-row>
            </div>
        </checkout>
    </div>
@endsection
