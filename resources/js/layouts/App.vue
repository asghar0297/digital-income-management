<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Digital Hisaab Kitaab  </router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" :to="{ name:'login'}" class="nav-item nav-link">Login</router-link>
                        <a  class="nav-item nav-link" @click.prevent="logout()">Logout</a>
                        <router-link exact-active-class="active" :to="{ name:'register'}" class="nav-item nav-link">Register</router-link>
                        <router-link exact-active-class="active" :to="{ name:'category'}" class="nav-item nav-link">Category</router-link>
                        <router-link  class="nav-item nav-link">Welcome {{ this.$store.getters.getUser.name }} </router-link>
                         <!-- <span class="navbar-text align-right" v-if="this.$store.getters.getUser.name">{{ this.$store.getters.getUser.name }}</span> -->
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <h1>Welcome {{ this.$store.getters.getUser.name }}</h1>
            <router-view></router-view>
        </div>

    </main>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        methods:{
                async logout(){
                         await this.axios.post('api/auth/logout').then(response=>{
                            this.$store.dispatch('removeToken')
                            this.$router.push({name:'login'})
                        }).catch(error=>{

                        })
                }
        },

    }
</script>
