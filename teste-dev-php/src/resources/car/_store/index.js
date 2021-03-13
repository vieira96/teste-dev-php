//importei as mutations e actions que criei em um arquivo separado para não encher meu index
import mutations from './mutations'
import actions from './actions'

const state = {
    carList: [],
    selectedCar: '',
    error: '',
    modalOpenned: false
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}