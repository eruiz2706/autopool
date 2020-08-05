<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Referral List</h1>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow ">
                <div class="card-header pt-4">
                    <h6 class="font-weight-bold text-primary">
                      Referral List
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center" v-if="loadingPage">
                        <div class="spinner-border text-primary mt-4 mb-4" role="status">
                        <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="table-responsive" >
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Registration date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in data">
                                    <td>{{ item.username }}</td>
                                    <td>{{ item.email }}</td>
                                    <td>{{ item.created_at }}</td>
                                </tr>
                            </tbody>
                            <tfoot v-if="paginas>0">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Registration date</th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="d-flex align-items-center justify-content-end" v-if="paginas>0">
                            <paginate
                            :page-count="paginas"
                                :prev-text="'Prev'"
                                :next-text="'Next'"
                                :container-class="'pagination'"
                                :page-class="'page-item'"
                                :page-link-class="'page-link'"
                                :prev-class="'page-item'"
                                :prev-link-class="'page-link'"
                                :next-class="'page-item'"
                                :next-link-class="'page-link'"
                                :active-class="'active'"
                                :disabled-class="'disabled'"
                                :click-handler="clickPage"
                            >
                            </paginate>
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
        return{
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            data: [],
            paginas: 0,
            loadingPage: false
        }
    },
    mounted() {
        this.getListado();
    },
    methods:{
        clickPage: function(pageNum) {
            this.loadingPage = true;
            this.req.get(`referidos/listado?page=${pageNum}`).then( response => {
                this.loadingPage = false;
                let referidos = response.data.referidos;
                this.data = referidos.data;
            }).catch( error =>{
                this.loadingPage = false;
              console.log(error);
            });
        },
        getListado(){
            this.loadingPage = true;
            this.req.get('referidos/listado').then( response => {
                this.loadingPage = false;
                let referidos = response.data.referidos;
                this.paginas = referidos.to;
                this.data = referidos.data;
                console.log(referidos);
            }).catch( error =>{
                this.loadingPage = false;
                console.log(error);
            });
        }
    },
}
</script>

<style>
</style>