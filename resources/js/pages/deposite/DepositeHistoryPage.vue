<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Deposite History</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow ">
            <div class="card-header pt-4">
                <h6 class="font-weight-bold text-primary">Deposite History</h6>
            </div>
            <div class="card-body">
                <div class="mb-2 float-right">
                    <div class="text font-weight-bold text-info text-uppercase mb-1">Total deposits</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 float-right"><i class="fa fa-ruble-sign"></i> {{ total_deposito }}</div>
                </div>
                <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Monto</th>
                                            <th>Confirmacion</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="deposito in depositos">
                                            <td>{{ deposito.id }}</td>
                                            <td>{{ deposito.monto }}</td>
                                            <td>{{ deposito.confirmacion_id }}</td>
                                            <td>{{ deposito.fecha_creacion }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Monto</th>
                                            <th>Confirmacion</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="d-flex align-items-center justify-content-end">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
            </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            depositos: {},
            total_deposito: 0
        }
    },
    mounted() {
        this.getDepositos();
    },
    methods:{
        getDepositos(){
            this.req.get('deposite/historial').then((response)=>{
                this.depositos = response.data.depositos; 
                this.total_deposito = response.data.total_deposito; 
                console.log(response);
            }, (response)=>{
                console.log(response.data);
            });
        }
    }
}
</script>

<style>
</style>