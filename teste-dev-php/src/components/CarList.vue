<template>
    <div class="car">
        <nav>
            <ul class="list">
                <!-- Instancia do componente de carro -->
                <!-- o component CarItem está emitindo um event de delete, para eu fazer todas as operações
                    assincronas no componente pai.
                 -->
                <CarItem v-for="car in cars" :key="car.id" :car="car" @delete="deleteCar($event.car)" />
            </ul>
        </nav>

        <!-- Botão de criar novo carro, com a mutation de toggle para evitar criar 2 metodos
            um para abrir e outro para fechar o modal    
         -->
        <div @click="modalToggle(true)" class="btn-new-car">
            Novo carro
        </div>

        <!-- Modal que só aparece se o modalOpenned estiver cmo true -->
        <!-- o mesmo emitindo o evento com a opção de salvar -->
        <Modal v-if="modalOpenned" @save="save($event)" />
    </div>
</template>

<script>

import Modal from './Modal'
import CarItem from './CarItem'

// Importei a função de auxilio na criação de namespace do próprio vuex
import { createNamespacedHelpers } from 'vuex'
const {mapState, mapMutations, mapActions} = createNamespacedHelpers('cars')

export default {
    name: 'CarList',
    
    components: {
        Modal,
        CarItem
    },
    methods: {
        
        save(event) {
            // verifico qual é o tipo de operação que retorna do modal para o programa tomar a decisão
            // entre salvar ou editar
            if(event.type == 'create') {
                this.createNewCar(event.car)
            } else {
                this.editCar(event.car)
            }     
        },

        // delete o carro especifico
        del(car) {
            this.deleteCar(car)
        },
    
        // importei as actions necessárias
        ...mapActions([
            'listCars',
            'createNewCar',
            'editCar',
            'deleteCar'
        ]),

        // importei a mutation modalToggle para abrir o modal quando clicar no botao de criar novo carro
        ...mapMutations([
            'modalToggle'
        ])

    },

    computed: {
        ...mapState({
            cars: state => state.carList,
            error: state => state.error,
            modalOpenned: state => state.modalOpenned
        }),
    },

    // alimento a lista de carros quando o componente é criado
    created() {
        this.listCars()
    }
}
</script>

<style>
    * {
        margin: 0;
        padding: 0;
    }
</style>

<style scoped>
    .list {
        display: flex;
        flex-wrap: wrap;
    }

    .btn-new-car {
        position: fixed;
        bottom: 10px;
        right: 10px;
        padding: 10px;
        background-color: #21c921;
        color: white;
        cursor: pointer;
    }

</style>