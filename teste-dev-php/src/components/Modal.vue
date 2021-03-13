<template>
    <div class="modal">
        <form @submit.prevent="save()">
            <!-- verifico atraves do selectedCar se tem algum carro selecionado, se n, exibo a mensage de
                Criando novo carro.
                Se sim, exibo a mensagem que estou editando o carro com o determinado id
             -->
            <h1 v-if="!selectedCar">Criando novo carro</h1>
            <h1 v-else style="font-size: 22px;">Editando o carro com o id {{selectedCar.id}}</h1>
            <input type="text" placeholder="Informe o modelo do carro." v-model="car.modelo">
            <label>Ano de fabricação</label>
            <input type="date" placeholder="Informe o ano do carro." v-model="car.ano">
            <label for="cars">Selecione a marca do carro</label>
            <select id="cars" v-model="car.marca">
                <option v-for="brand in brands" :key="brand.id" :value="brand.val">{{brand.val}}</option>
            </select>
            <div class="buttons">
                <!-- exibo o valor do botao de acordo com a prop buttonValue -->
                <input type="submit" :value="buttonValue">
                <button @click="reset()">Cancelar</button>
            </div>

            <!-- se existir algum erro, ele é mostrado -->
            <div v-if="error" class="alert-error">
                {{error}}
            </div>
        </form>
    </div>
</template>

<script>

import { createNamespacedHelpers } from 'vuex'
const {mapState, mapMutations} = createNamespacedHelpers('cars')

export default {
    name: 'Modal',
    data() {
        return {
            //inicio o objeto carro
            car: {
                modelo: '',
                marca: '',
                ano: ''
            },
            //marcas de carro, poderia ter uma tabela para elas
            brands: {
                1: {id: 1, val: 'volvo'},
                2: {id: 2, val: 'saab'},
                3: {id: 3, val: 'mercedes'},
                4: {id: 4, val: 'audi'},
                5: {id: 5, val: 'bmw'},
            },
           
        }
    },
    methods: {
        //executo o metodo save e inicio com o type create, se tiver um carro selecionado eu altero para update
        save() {
            let type = 'create'
            if(this.selectedCar) {
                type = 'update'
            }
            //emito o evento com o typo e o carro criado ou editado
            this.$emit('save', {type: type, car: this.car})
        },
        
        ...mapMutations([
            'reset',
            'displayError'
        ])
    },
    computed: {
        ...mapState({
            selectedCar: state => state.selectedCar,
            error: state => state.error
        }),

        //prop para saber o nome do botao
        buttonValue () {
            return this.selectedCar ? 'Salvar' : 'Criar'
        }
    },

    created() {
        //assim que é criado, eu verifico se tem um carro selecionado, se sim, eu faço uma copia dele
        //para não ter problema com o vuex
        if(this.selectedCar) {
            this.car = Object.assign(
                {},
                this.selectedCar
            )
        }
    }
}
</script>

<style scoped>
    .modal {
        width: 100%;
        height: 100vh;
        position: fixed;
        z-index: 999;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(36, 37, 66, 0.5);
    }

    form {
        background-color: rgb(36, 37, 66);
        width: 50%;
        height: 50%;
        opacity: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form h1 {
        color: white;
        margin-bottom: 5px;
    }

    form input {
        padding: 10px;
        outline: none;
        border: 0;
        margin-bottom: 5px;
        width: 70%;
    }

    label {
        width: 70%;
        color: white;
        font-size: 16px;
        padding: 10px;
    }

    #cars {
        width: 70%;
        padding: 5px;
        margin-bottom: 5px;
        outline: none;
    }
    
    .buttons {
        width: 70%;
        display: flex;
        justify-content: center;
        margin-bottom: 5px;
    }

    .buttons input[type=submit] {
        width: 30%;
        cursor: pointer;
        background-color: rgb(12, 158, 12);
        color: white;
        height: 30px;
        padding: 0;
    }

    .buttons button {
        width: 30%;
        cursor: pointer;
        background-color: rgb(248, 15, 15);
        color: white;
        border: 0;
        margin-left: 5px;
        height: 30px;
    }

    .alert-error {
        padding: 5px;
        border: 1px solid rgb(248, 15, 15);
        background-color: rgb(240, 42, 42);
        color: white;
        width: 70%;
        display: flex;
        justify-content: center;
    }

    @media screen and (max-width: 768px) {
        form {
            width: 80%
        }
    }

    @media screen and (max-width: 425px) {
        form {
            width: 100%
        }
    }

</style>