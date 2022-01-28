export default {
    namespaced: true,
    state: {
        transactions: 0,
      },
      getters: {
          transactions: state => state.transactions,
      },
      mutations: {
          insert: (state, payload) => {
              state.transactions++;
          }
      },
}
