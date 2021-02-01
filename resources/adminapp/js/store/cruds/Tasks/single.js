function initialState() {
  return {
    entry: {
      id: null,
      name: '',
      client_id: null,
      porject_type_id: null,
      start_date: '',
      deadtime: '',
      price: '',
      costs: '',
      status_id: null,
      invoice: false,
      paid: false,
      description: '',
      assingned: [],
      comments: [],
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      client: [],
      porject_type: [],
      status: [],
      assingned: [],
      comments: []
    },
    loading: false
  }
}

const route = 'tasks'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setName({ commit }, value) {
    commit('setName', value)
  },
  setClient({ commit }, value) {
    commit('setClient', value)
  },
  setPorjectType({ commit }, value) {
    commit('setPorjectType', value)
  },
  setStartDate({ commit }, value) {
    commit('setStartDate', value)
  },
  setDeadtime({ commit }, value) {
    commit('setDeadtime', value)
  },
  setPrice({ commit }, value) {
    commit('setPrice', value)
  },
  setCosts({ commit }, value) {
    commit('setCosts', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
  },
  setInvoice({ commit }, value) {
    commit('setInvoice', value)
  },
  setPaid({ commit }, value) {
    commit('setPaid', value)
  },
  setDescription({ commit }, value) {
    commit('setDescription', value)
  },
  setAssingned({ commit }, value) {
    commit('setAssingned', value)
  },
  setComments({ commit }, value) {
    commit('setComments', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setName(state, value) {
    state.entry.name = value
  },
  setClient(state, value) {
    state.entry.client_id = value
  },
  setPorjectType(state, value) {
    state.entry.porject_type_id = value
  },
  setStartDate(state, value) {
    state.entry.start_date = value
  },
  setDeadtime(state, value) {
    state.entry.deadtime = value
  },
  setPrice(state, value) {
    state.entry.price = value
  },
  setCosts(state, value) {
    state.entry.costs = value
  },
  setStatus(state, value) {
    state.entry.status_id = value
  },
  setInvoice(state, value) {
    state.entry.invoice = value
  },
  setPaid(state, value) {
    state.entry.paid = value
  },
  setDescription(state, value) {
    state.entry.description = value
  },
  setAssingned(state, value) {
    state.entry.assingned = value
  },
  setComments(state, value) {
    state.entry.comments = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
