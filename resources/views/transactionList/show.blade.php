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
                        <transaction-item-list inline-template :url="`{{ route('transaction-list.show', $transaction->id) }}`">
                            <div>
                                <spinner v-if="isBusy" class="mt-5"></spinner>
                                <b-table show-empty busy.sync="isBusy" v-if="!isBusy" stacked="lg" responsive
                                         :items="items" :fields="fields"
                                         v-cloak>

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
                        </transaction-item-list>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <a href="{{ route('transaction-list.index') }}" class="btn btn-md btn-primary px-4 py-2 rounded-pill">Back To Transaction List</a>
                    </b-col>
                    <b-col align-v="end" class="text-right">
                        Total Price : ${{ $transaction->total_price }}
                    </b-col>
                </b-row>
            </b-card-body>
        </b-card>
    </b-container>

@endsection
