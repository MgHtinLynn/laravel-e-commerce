@extends('layouts.app')

@section('content')
    <b-container fluid>
        <b-card>
            <b-card-body>
                <b-row>
                    <b-col>
                        <h3>Customer Management</h3>
                    </b-col>
                </b-row>
                @include('utilize.flash-message')
                <b-row>
                    <b-col>
                        <customer-listing :url="`{{ route('customer-list.index') }}`" inline-template>
                            <div>
                                <spinner v-if="isBusy" class="mt-5"></spinner>
                                <b-table show-empty busy.sync="isBusy" v-if="!isBusy" stacked="lg" responsive
                                         :items="items" :fields="fields"
                                         v-cloak>
                                    <template #cell(id)="row">
                                        @{{ row.index + 1 }}
                                    </template>


                                    <template v-slot:cell(actions)="row">
                                        <a
                                           :href="`/customer-list/${row.item.id}/edit`"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-user-edit"></i> Edit
                                        </a>

                                        <b-btn  size="sm"
                                               variant="danger"
                                               @click="$bvModal.show('delete' + row.item.id)">
                                            <i class="fas fa-fw fa-ban"></i> Delete
                                        </b-btn>

                                        <b-modal lazy hide-footer :id="'delete' + row.item.id" title="Delete Customer Accocunt"
                                                 >

                                            <template slot="default" slot-scope="{ cancel }">
                                                <p>Are you sure you want to <span
                                                            class="text-danger"><strong>Delete</strong></span> this Customer Account ?
                                                </p>
                                                <hr>
                                                <form :action="`/customer-list/${row.item.id}`" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="text-right">
                                                        <b-button variant="secondary" @click="cancel()">Cancel
                                                        </b-button>
                                                        <button class="btn btn-danger">Confirm</button>
                                                    </div>
                                                </form>
                                            </template>
                                        </b-modal>
                                    </template>
                                </b-table>

                                <div class="row my-4">
                                    <div class="col-6 d-flex">
                                        <b-pagination
                                                v-if="!isBusy"
                                                align="left"
                                                :total-rows="pagination.total"
                                                prev-text="Previous"
                                                next-text="Next"
                                                :hide-ellipsis="true"
                                                v-model="pagination.current_page"
                                                @change="getResults"
                                                :per-page="pagination.per_page"
                                                v-show="pagination.total > selected"
                                                limit="3"
                                                class="mb-0 table-pagination-item"
                                        ></b-pagination>

                                        <b-form-select class="w-auto table-perPage-selector ml-2" @change="getResults()"
                                                       v-model="selected"
                                                       :options="options" v-if="!isBusy"></b-form-select>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0 text-right" v-if="!isBusy ">
                                            Showing <span v-text="pagination.from"></span> - <span
                                                    v-text="pagination.to"></span> of
                                            <span
                                                    v-text="pagination.total"></span> entries
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </customer-listing>
                    </b-col>
                </b-row>
            </b-card-body>
        </b-card>
    </b-container>
@endsection
