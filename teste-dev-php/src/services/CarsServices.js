import axios from 'axios'

const apiClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api'
})

export default {
    getCars() {
        return apiClient.get('/carros')
    },

    createCar(car) {
        return apiClient.post('/carros', car)
    },

    updateCar(car) {
        return apiClient.put(`/carros/${car.id}`, car)
    },

    delete(car) {
        return apiClient.delete(`/carros/${car.id}`)
    }

}