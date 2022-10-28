<template>
    <div class="container">
        <div class="row">
            <h1>Register</h1>
        </div>
        <div class="row">
            <form class="row g-3" @submit.prevent="register">
               
                <div class="alert alert-danger" role="alert" v-if="errors">
                    <div v-for="(error,key) in errors">
                       <span   v-for="err in error">{{ err }}</span>
                    </div>
                </div>

                <div class="alert alert-success" role="alert" v-if="success_message">
                   {{success_message}}
                </div>

                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" v-model="form_data.name" >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="form_data.email" >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="form_data.password" >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Confirm password</label>
                    <input type="password" class="form-control" v-model="form_data.password_confirmation" >
                </div>

                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>


export default{
    data(){
        return{
         
            form_data:{
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            },
            errors:'',
            success_message:''
        }
    },
    ceated(){
       
    },
    mounted(){
    },
    methods:{
        async register(){
    
            await this.axios.post('api/auth/register',this.form_data).then(response=>{
                
                 const token = 'Bearer '+response.data.data.token
                 this.$store.dispatch('setToken',token)
                 this.$store.dispatch('setUser',response.data.data.user)
                 this.$router.push({name:'category'})

            }).catch(error=>{
                 if (error.response) {
                       this.errors = JSON.parse( error.response.data.message)
                        
                    } 
            })
        }
    }
}

</script>
