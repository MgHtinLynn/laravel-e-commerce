import Vue from 'vue';

Vue.component('app-layout', require('./components/Layouts/AppLayout').default);


Vue.component('item-list', require('./components/Home/ItemList').default);
Vue.component('add-to-cart', require('./components/Home/AddToCart').default);
Vue.component('checkout', require('./components/Home/Checkout').default);
Vue.component('checkout-success', require('./components/Home/CheckoutSuccess').default);
Vue.component('checkout-cancel', require('./components/Home/CheckoutCancel').default);

//transaction list
Vue.component('transaction-list', require('./components/Admin/Transactionlist/List').default);
Vue.component('transaction-item-list', require('./components/Admin/TransactionItemList/List').default);

//
// //Helper
Vue.component("spinner", require("./components/Spinner.vue").default);
//
// //Utilize
Vue.component("app-form-section", require("./components/Utilities/AppFormSection.vue").default);
Vue.component("app-input-error", require("./components/Utilities/AppInputError.vue").default);
Vue.component("app-flash-message", require("./components/Utilities/AppFlashMessage.vue").default);

// Customer CURD
Vue.component('customer-listing', require('./components/Admin/Customer/Listing').default);
//ue.component('admin-create-form', require('./components/Admin/Customer/AdminCreateForm').default);
Vue.component('customer-edit-form', require('./components/Admin/Customer/CustomerEditForm').default);


// Item CURD
Vue.component('item-listing', require('./components/Admin/Item/Listing').default);
Vue.component('item-create-form', require('./components/Admin/Item/ItemCreateForm').default);
Vue.component('item-edit-form', require('./components/Admin/Item/ItemEditForm').default);

// // User Log
// Vue.component('admin-user-log-listing', require('./components/Admin/UserLog/Listing').default);
//
// //First Time Login
// Vue.component('first-time-login-change-password', require('./components/Admin/ChangePassword').default);
//
// // Admin dashboard
// Vue.component('app-dashboard', require('./components/Dashboard').default);
