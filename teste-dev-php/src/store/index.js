import Vue from 'vue'
import Vuex from 'vuex'
import cars from '@/resources/car/_store/index'

Vue.use(Vuex)

export default new Vuex.Store({
	strict: true,
	modules: {
		cars
	}
})
