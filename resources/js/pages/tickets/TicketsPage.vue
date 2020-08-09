<template>
<div class="container-fluid">
    <div class="modal fade" id="modalticket" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" v-on:submit.prevent="crearTicket()">
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" v-model="subject_ticket">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" v-model="description_ticket"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" :disabled="loadingSubmit">Create</button>
            </div>
            </form>
            </div>
        </div>
    </div>


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tickets List</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" @click.prevent="openModalTicket()" v-if="getRol !== 'admin'">
            <i class="fas fa-list fa-sm text-white-50"></i> New Ticket
        </button>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-primary text-center text-uppercase">{{ tickets_totales }}</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Total</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-info text-center text-uppercase">{{ tickets_pendientes }}</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Pending</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-warning text-center text-uppercase">{{ tickets_progreso }}</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">In progress</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-danger text-center text-uppercase">{{ tickets_cerrado}}</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Closed</div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow ">
                <div class="card-header pt-4">
                  <h6 class="font-weight-bold text-primary">Tickets List</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center" v-if="loadingPage">
                        <div class="spinner-border text-primary mt-4 mb-4" role="status">
                        <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Subject</th>
                                                <th>Created by</th>
                                                <th>Status</th>
                                                <th>Registration date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in data">
                                                <td>{{ item.id }}</td>
                                                <td>
                                                    <a href="#" @click.prevent="detalleTicket(item.id)">{{ item.titulo }}</a>
                                                </td>
                                                <td>{{ item.username }}</td>
                                                <td>
                                                    <span v-bind:class="'badge badge-'+item.color">{{ item.descripcion }}</span>
                                                </td>
                                                <td>{{ item.fecha_creacion }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot v-if="paginas>1">
                                            <tr>
                                                <th>Id</th>
                                                <th>Subject</th>
                                                <th>Created by</th>
                                                <th>Status</th>
                                                <th>Registration date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex align-items-center justify-content-end" v-if="paginas>1">
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
            subject_ticket: '',
            description_ticket: '',
            loadingSubmit: false,
            loadingPage: false,
            data: [],
            paginas: 0,
            tickets_totales: 0,
            tickets_pendientes: 0,
            tickets_progreso: 0,
            tickets_cerrado: 0,
            rol: ''
        }
    },
    mounted() {
        this.getListado();
        this.getIndicadores();
    },
    methods:{
        clickPage: function(pageNum) {
            this.loadingPage = true;
            this.req.get(`ticket/listado?page=${pageNum}`).then( response => {
                this.loadingPage = false;
                let tickets = response.data.tickets;
                this.data = tickets.data;
            }).catch( error =>{
                this.loadingPage = false;
              console.log(error);
            });
        },
        openModalTicket:function(){
          this.subject_ticket = '';
          this.description_ticket = '';
          $('#modalticket').modal('show');
        },
        crearTicket(){
            this.errors = [];
            this.loadingSubmit = true;
            let data = {
              subject_ticket: this.subject_ticket,
              description_ticket: this.description_ticket,
            }
            this.req.post('ticket/crear',data).then( response =>{
                this.loadingSubmit = false; 
                this.subject_ticket='';
                this.description_ticket='';
                this.getListado();
                this.getIndicadores();
                $('#modalticket').modal('hide');
                console.log(response.data.tickets);
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
            }).catch( error =>{
              this.loadingSubmit = false; 
              if(error.response.data.errors) this.errors = error.response.data.errors;
              this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            });
        },
        getListado(){
            this.loadingPage = true;
            this.req.get('ticket/listado').then( response => {
                this.loadingPage = false;
                let tickets = response.data.tickets;
                this.paginas = tickets.last_page;
                this.data = tickets.data;
                this.rol = response.data.rol;
                console.log(response);
            }).catch( error =>{
                this.loadingPage = false;
                console.log(error);
            });
        },
        getIndicadores(){
            this.req.get('ticket/indicadores').then( response => {
                let data = response.data;
                this.tickets_totales = data.tickets_totales;
                this.tickets_pendientes = data.tickets_pendientes;
                this.tickets_progreso = data.tickets_progreso;
                this.tickets_cerrado = data.tickets_cerrado;
            }).catch( error =>{
                console.log(error);
            });
        },
        detalleTicket(id){
            this.$router.push({ path: `/tickets-details/${id}` });
        }
    },
    computed:{
      getRol(){
        return this.$store.state.user.rol;
      },
    }
}
</script>

<style>
</style>