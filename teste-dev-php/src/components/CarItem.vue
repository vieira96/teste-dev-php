<template>
    <li class="list-item">
        <div class="car-info">
            Ano: {{car.ano}} <br>
            Modelo: {{car.modelo}} <br>
            Marca: {{car.marca}} <br>
        </div>

        <div class="options">
            <!-- emito o evento de delete passando o carro -->
            <button @click="$emit('delete', {car})" class="btn btn-delete">
                Deletar
            </button>
            <!-- seleciono o carro para edição e abro o modal -->
            <button @click="selectCar(car), modalToggle(true) " class="btn btn-edit">Editar</button>
        </div>
    </li>
</template>

<script>


import { createNamespacedHelpers } from 'vuex'
const {mapMutations} = createNamespacedHelpers('cars')

export default {
    name: 'CarItem',
    props: [
        'car'
    ],
    methods: {
        ...mapMutations([
            'selectCar',
            'modalToggle'
        ])
    }
}
</script>

<style scoped>
    .list-item {
        margin: 5px;
        padding: 5px;
        list-style: none;
        width: 45%;
        display: flex;
        border: 1px solid #ccc;
    }

    .car-info {
        width: 30%;
    }

    .options {
        flex: 1;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .btn {
        padding: 5px;
        border: 0;
        margin-right: 4px;
        cursor: pointer;
    }

    .btn-delete {
        background-color: #f02e2e;
        color: white;
    }

    .btn-edit {
        background-color: #402cf8;
        color: white;
    }

    @media screen and (max-width: 475px) {
        .list-item {
            width: 100% !important;
        }
    }

    
</style>