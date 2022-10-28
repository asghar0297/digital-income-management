import Vue from 'vue'
import Vuex from 'vuex'


import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

const store = new Vuex.Store({
    plugins: [createPersistedState()],

    state:{
        token:localStorage.getItem('token') || 0,
        user:{}
    },
    mutations:{
        UPDATE_TOKEN(state,payload){
            state.token = payload
        },
        UPDATE_USER(state,payload){
            state.user = payload
        }
    },
    actions:{
        setToken(context,payload){
            localStorage.setItem('token',payload)
            axios.defaults.headers.common["Authorization"] = "Bearer" + payload
            axios.defaults.headers.common["Accept"] = "application/json"
            context.commit('UPDATE_TOKEN',payload)
        },
        setUser(context,payload){
            context.commit('UPDATE_USER',payload)
        },
        removeToken(context){
            localStorage.removeItem('token')
            context.commit('UPDATE_TOKEN',0)
        }
    },
    getters:{
        getToken:function(state){
            return state.token
        },
        getUser:function(state){
            return state.user
        }
    }
})


export default store;