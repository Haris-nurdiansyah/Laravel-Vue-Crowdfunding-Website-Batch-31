import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    transaction: 0
  },
  getters: {
    transactionCounter(state) {
        return state.transaction
    },
  },
  mutations: {
    increment (state) {
      state.transaction++
    }
  },
});

export default store;
