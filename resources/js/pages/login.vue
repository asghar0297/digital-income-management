<template>
    <div class="container">
        <div class="row">
            <h1>Login</h1>
        </div>
        <div class="row">
            <form class="row g-3" @submit.prevent="login">
               
                <div class="alert alert-danger" role="alert" v-if="errors">
                    <div v-for="(error,key) in errors">
                       <span   v-for="err in error">{{ err }}</span>
                    </div>
                </div>
                

                <div class="alert alert-success" role="alert" v-if="success_message">
                   {{success_message}}
                </div>
                
                <div class="alert alert-danger" role="alert" v-if="error_message">
                   {{error_message}}
                </div>

               

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="form_data.email" >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="form_data.password"  >
                </div>

                

                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">SignIn</button>
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
                email:'admin@mail.com',
                password:'123456',
            },
            errors:'',
            success_message:'',
            error_message:''
        }
    },
    ceated(){
       
    },
    mounted(){
    },
    methods:{
        async login(){
    
            await this.axios.post('api/auth/login',this.form_data).then(response=>{
                if(response.status){
                    const token = response.data.data.token
                    const user = response.data.data.user
                    console.log(response.data.data.user);
                    this.$store.dispatch('setToken',token)
                    this.$store.dispatch('setUser',user)
                  
                    // this.$router.push({name:'category'})
                }
            }).catch(error=>{
                 if (error.response) {
                       this.errors = JSON.parse( error.response.data.message) ? JSON.parse( error.response.data.message) :  response.data.message
                        // this.error_message = response.data.message
                    } 
            })
        }
    }
}

</script>
