@extends('layouts.app')

@section('content')

        <b-container>
            <b-card>
                <b-card-body>
                    <b-row>
                        <b-col>
                            <h3>Transaction List</h3>
                        </b-col>

                    </b-row>
                    @include('utilize.flash-message')
                    <b-row>
                        <b-col>
                            <transaction-list inline-template :url="`{{ route('transaction-list.index') }}`">
                                <div>
                                    <spinner v-if="isBusy" class="mt-5"></spinner>
                                    <b-table show-empty busy.sync="isBusy" v-if="!isBusy" stacked="lg" responsive
                                             :items="items" :fields="fields"
                                             v-cloak>

                                        <template #cell(user_name)="row">
                                            @{{ row.item.user_name ? row.item.user_name : '-' }}
                                        </template>

                                        <template #cell(total_price)="row">
                                            $@{{ row.item.total_price }}
                                        </template>

                                        <template #cell(total_price)="row">
                                            $@{{ row.item.total_price }}
                                        </template>

                                        <template #cell(actions)="row">
                                            <a :href="`/transaction-list/${row.item.id}`"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </template>
                                    </b-table>


                                </div>
                            </transaction-list>
                        </b-col>
                    </b-row>
                </b-card-body>
            </b-card>
        </b-container>

@endsection
