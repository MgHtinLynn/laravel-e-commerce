import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";
import {comment} from "postcss";

Vue.use(Vuex)

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
        items: [],
        count: 0,
        total: 0
    },
    getters: {
        count(state) {
            return state.count
        },
        items(state) {
            return state.items
        },
        total(state) {
            return state.total
        }
    },
    mutations: {
        ADD_ITEM(state, payload) {
            // push item to list
            state.items.push(payload)
        },
        INCREMENT(state) {
            //increment item count
            state.count++
        },
        DECREMENT(state) {
            //decrement item count
            state.count--
        },
        ADD_QUANTITY(state, payload) {
            //add to quantity for same item
            state.items[payload].quantity++
        },
        DECREMENT_QUANTITY(state, payload) {
            //decrement item count
            state.items[payload].quantity--
        },
        DELETE_ITEM(state, payload) {
            //delete item
            state.items.splice(payload, 1)
        },
        SET_COUNT(state, payload) {
            Vue.set(state, 'count', payload)
        },
        SET_TOTAL(state, payload) {
            Vue.set(state, 'total', payload)
        },
        SET_ITEM_TOTAL(state, payload) {
            state.items[payload.itemIndex].price = payload.itemPrice
        },
        SET_ITEM_VALUE(state, payload) {
            state.items[payload.itemIndex].price = payload.itemPrice
        }
    },
    actions: {
        async addItem(context, payload) {
            let lists = this.state.items

            if (lists.length > 0) {
                //search index in list
                let itemIndex = lists.map((d) => d.id).indexOf(payload.id)

                //search item id in list
                if (lists.map((d) => d.id).includes(payload.id)) {
                    context.commit('ADD_QUANTITY', itemIndex)

                    //calculate item total and set item cost
                    let itemPrice = lists[itemIndex].quantity * lists[itemIndex].original_price
                    context.commit('SET_ITEM_TOTAL', {'itemPrice': itemPrice, 'itemIndex': itemIndex})

                } else {
                    // commit the mutations
                    context.commit('ADD_ITEM', payload)
                }

                //calculate total and set total cost
                let totalPrice = this.state.total + payload.original_price
                context.commit('SET_TOTAL', totalPrice)
            } else {
                //add new item
                context.commit('ADD_ITEM', payload)
                //set total price from item price
                context.commit('SET_TOTAL', payload.price)
            }
            //add increment count
            context.commit('INCREMENT')
        },
        async increment(context, payload) {
            let lists = this.state.items
            let itemIndex = lists.map((d) => d.id).indexOf(payload)

            //add quantity to item
            context.commit('ADD_QUANTITY', itemIndex)

            //calculate total and set total cost
            let totalPrice = this.state.total + lists[itemIndex].original_price
            context.commit('SET_TOTAL', totalPrice)

            //calculate item total and set item cost
            let itemPrice = lists[itemIndex].quantity * lists[itemIndex].original_price
            context.commit('SET_ITEM_TOTAL', {'itemPrice': itemPrice, 'itemIndex': itemIndex})

            //add increment count
            context.commit('INCREMENT')
        },
        async decrement(context, payload) {
            let lists = this.state.items
            let itemIndex = lists.map((d) => d.id).indexOf(payload)

            if (lists[itemIndex].quantity > 1) {
                if (lists[itemIndex].quantity === 1) {
                    context.commit('DELETE_ITEM', itemIndex)
                } else {
                    //decrement item quantity
                    context.commit('DECREMENT_QUANTITY', itemIndex)

                    //calculate item total and set item cost
                    let itemPrice = lists[itemIndex].quantity * lists[itemIndex].original_price
                    context.commit('SET_ITEM_VALUE', {'itemPrice': itemPrice, 'itemIndex': itemIndex})
                }
                //calculate total and set total cost
                let totalPrice = this.state.total - lists[itemIndex].original_price
                context.commit('SET_TOTAL', totalPrice)

                //decrement item quantity
                context.commit('DECREMENT')
            }
        },
        async delete(context, payload) {
            let lists = this.state.items
            let itemIndex = lists.map((d) => d.id).indexOf(payload)
            let currentQuantity = this.state.count - lists[itemIndex].quantity
            let itemPrice = lists[itemIndex].price

            //set count quantity
            context.commit('SET_COUNT', currentQuantity)
            //delete item
            context.commit('DELETE_ITEM', itemIndex)

            //calculate total and set total cost
            let totalPrice = this.state.total - itemPrice

            // commit the total price
            context.commit('SET_TOTAL', totalPrice)

        }
    }
})

export default store
