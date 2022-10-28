<template>
    <div class="container">
        <div class="row">
            <h1>Add Category</h1>
        </div>
        <div class="row">
            <form class="row g-3">
                
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" v-model="form_data.category" >
                </div>

                <div class="col-md-4">
                    <label  class="form-label">Category Type</label>
                    <select  class="form-select" v-model="form_data.type">
                    <option  value="">Please Select</option>
                        <option v-for="type in types" :value="type.key" >  {{ type.value}} </option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

export default{
    data(){
        return{
            types:[
                {key:'expense',value:'Expense'},
                {key:'income',value:'Income'},
            ],
            form_data:{
                category:'',
                type:''
            }
        }
    },
    ceated(){

    },
    mounted(){

    },method(){
        
    }
}

</script>
