<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Prueba ticket</h1>
        <a href=""><i class="fa fa-arrow-left text-100"></i></a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">Comments</h1>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                <div class="card-header">
                  Eduardo Ruiz
                  <span class="float-right">12:50 pm</span>
                </div>
                <div class="card-body">
                  Se solicita la creacion de un nuevo movimiento
                </div>
              </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-4">
                <div class="card-header">
                  Eduardo Ruiz
                  <span class="float-right">12:50 pm</span>
                </div>
                <div class="card-body">
                  Se solicita la creacion de un nuevo movimiento
                </div>
              </div>
            </div>
        </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            req: axios.create({
                baseUrl:  BASE_URL
            })
        }
    },
    mounted() {
       
    },
    methods:{
       
    }
}
</script>

<style>
</style>