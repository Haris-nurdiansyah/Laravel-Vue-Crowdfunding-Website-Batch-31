import Vue from 'vue'
import Vuex from 'vuex'
import transaction from './stores/transaction.js'
import alert from './stores/alert.js'
import auth from './stores/auth'
import dialog from './stores/dialog.js'
import VuexPersist from 'vuex-persist'

const vuexPersist = new VuexPersist({
    key: 'myApp',
    storage: localStorage
});

Vue.use(Vuex)

const store = new Vuex.Store({
    plugins: [vuexPersist.plugin],
    modules: {
        transaction,
        alert,
        auth,
        dialog,
    }
});

export default store;
