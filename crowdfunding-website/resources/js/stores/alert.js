export default {
    namespaced: true,
    state: {
        status: false,
        color: '',
        text: ''
    },
    mutations: {
        set: (state, payload) => {
            state.status = payload.status
            state.color = payload.color
            state.text = payload.text
        }
    },
    actions: {
        set: ({commit}, payload) => {
            commit('set', payload)
        },
    },
    getters: {
        status: state => state.status,
        text: state => state.text,
        color: state => state.color
    }
}
