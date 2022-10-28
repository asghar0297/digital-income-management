<template>
    <div class="containder">
        <div class="row">
            <div class="col-md-9">
                <h1>Category List</h1>
            </div>
            <div class="col-md-3">
                <router-link :to="{name:'addCategory'}" class="btn btn-success">Add Category</router-link>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
            <caption>List of Categories</caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-if="categories.length > 0">
                <tr v-for="category in categories" :key="category.id">
                    <th scope="row">{{ category.id }}</th>
                    <td>{{ category.category }}</td>
                    <td>{{ category.type }}</td>
                    <td>
                        <router-link :to="{ name:'editCategory',param:{id:category.id}}" class="btn btn-primary btn-sm">Edit</router-link>
                        <button type="button"  class="btn btn-danger btn-sm" @click="deleteCategory(category.id)">Delete</button>
                    </td>
                </tr>

            </tbody>
            <tbody v-else>
                <tr>
                    <th scope="row" colspan="5">No Record Found</th>
                </tr>

            </tbody>
            </table>
        </div>
    </div>
</template>

<script>



export default{
        name:"categoryList",
        data(){
            return{

                categories:[]
            }
        },
        methods:{
            async getCategories(){
                await this.axios.get('api/category').then(response=>{
                            console.log(response);
                            this.categories = response.data.data
                }).catch(error=>{
                    console.log('error',error);
                })
            },
            deleteCategory(id){
                let confirm = window.confirm("Are you sure to delete this category ?")
                if(confirm){
                    this.axios.delete(`api/category/${id}`).then(response => {
                        this.getCategories()
                    }).catch(error => {
                        console.log('error',error);
                    })
                }
            }
        },
        created(){

        },
        mounted(){
            this.getCategories()
        }
    }

</script>
