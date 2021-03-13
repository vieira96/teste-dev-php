import CarsServices from '@/services/CarsServices'

export default {
    //action para fazer a operação asincrona, recebendo os dados da api
    listCars: async({commit}) => {
        const response = await CarsServices.getCars()
        commit('listCars', {cars: response.data.cars})
    },

    //action para criar o novo carro
    createNewCar: ({commit}, payload) => {
        CarsServices.createCar(payload)
            .then(res => {
                //verifica se deu erro, se sim, joga o erro no display pro usuário saber o que aconteceu
                if(res.data.error) {
                    commit('displayError', res.data.error)
                } else {
                    //se não deu erro, jogo um displayError vazio para limpar se antes houve algum erro
                    commit('displayError', '')
                    //fecho o modal
                    commit('modalToggle', false)
                    //e dou o commit na mutation de criar o carro
                    commit('createNewCar', payload)
                }
            })
    },

    //action de editar ocarro   
    editCar: ({commit}, payload) => {
        CarsServices.updateCar(payload)
            .then(res => {
                //verifica se deu erro, se sim, joga o erro no display pro usuário saber o que aconteceu
                if(res.data.error) {
                    commit('displayError', res.data.error)
                } else {
                    //reseto tudo e envio o carro novo para a mutation de editar
                    commit('displayError', '')
                    commit('modalToggle', false)
                    commit('editCar', payload)
                }
            })
    },

    //action de deletar o carro
    deleteCar:({commit}, payload) => {
        CarsServices.delete(payload)
            .then(() => {
                commit('deleteCar', payload)
            })
    }
}