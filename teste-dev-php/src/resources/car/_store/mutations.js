export default {
    //mutation para alimentar a lista de carros
    listCars: (state, payload) => {
        state.carList = payload.cars
    },
    //Após ser persistido no banco, eu jogo o carro criado no array de carros.
    createNewCar: (state, payload) => {
        state.carList.push(payload)
    },

    //seleciono o carro para a edição
    selectCar: (state, payload) => {
        state.selectedCar = payload
    },

    editCar: (state, payload) => {
        //pego o indice do carro para logo após dar um splice nele e colocar o carro editado
        const indice = state.carList.findIndex(c => c.id == payload.id)
        state.carList.splice(indice, 1, payload)
    },

    deleteCar: (state, payload) => {
        //pego o indice do carro para logo após dar um splice nele para deleta-lo da lista.
        const indice = state.carList.findIndex(c => c.id == payload.id)
        state.carList.splice(indice, 1)
    },

    //mutation criada para mostrar o erro que vem direto da API
    displayError:(state, payload) => {
        state.error = payload
    },

    //toggle do modal
    modalToggle: (state, payload) => {
        state.modalOpenned = payload
    },

    //reset para limpar todas as operações
    reset:(state) => {
        state.error = ''
        state.modalOpenned = false
        state.selectedCar = ''
    }


}