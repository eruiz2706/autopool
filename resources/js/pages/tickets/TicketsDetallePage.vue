<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ ticket.titulo }}</h1>
        <button class="d-none d-sm-inline-block btn btn-sm  btn-light" @click.prevent="goBack()"><i class="fa fa-arrow-left fa-sm text-200"></i> Go back</button>
    </div>
    <div class="row" v-if="ticket.estado !== 'CL'">
        <div class="col-md-12">
            <div class="form-group">
                <label>Comments</label>
                <textarea class="form-control" rows="3" placeholder="" v-model='descripcion'></textarea>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <button type="submit" class="btn btn-primary btn-sm" :disabled="loadingSubmit" @click.prevent="actualizaTicket()">Update ticket</button>
            <button type="submit" class="btn btn-info btn-sm" :disabled="loadingClose" @click.prevent="cerrarTicket()">Close ticket</button>
        </div>
    </div>

    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">Comments</h1>
    </div>

    <div class="d-flex justify-content-center" v-if="loadingPage">
        <div class="spinner-border text-primary mt-4 mb-4" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" v-for="item in detalles">
            <div class="card mb-4">
            <div class="card-header text-primary">
                {{ item.username }}
                <span class="float-right">{{ item.fecha_creacion }}</span>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line;">{{ item.descripcion }}</p>
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
            id: '',
            ticket: {},
            detalles: [],
            loadingPage: false,
            loadingSubmit: false,
            descripcion: '',
            loadingClose: false
        }
    },
    mounted() {
        this.getTicket();
    },
    methods:{
       goBack(){
           this.$router.push('/tickets');
       },
       getTicket(){
           this.loadingPage = true;
           this.id = this.$route.params.id;
           this.req.get(`ticket/edit/${this.id}`).then( response => {
                this.loadingPage = false;
                this.ticket = response.data.ticket;
                this.detalles = response.data.detalles;
            }).catch( error =>{
                this.loadingPage = false;
                //console.log(error);
            });
       },
       actualizaTicket(){
            let data = {
              descripcion: this.descripcion,
              id: this.id,
              estado: this.ticket.estado
            }
            this.loadingSubmit = true;
            this.req.post('ticket/actualizar',data).then( response =>{
                this.loadingSubmit = false; 
                this.descripcion='';
                this.getTicket();
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
            }).catch( error =>{
              this.loadingSubmit = false; 
              this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            });
        },
        cerrarTicket(){
            let data = {
              id: this.id,
            }
            this.loadingClose = true;
            this.req.post('ticket/cerrar',data).then( response =>{
                this.loadingClose = false; 
                this.$router.push('/tickets');
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
            }).catch( error =>{
              this.loadingClose = false; 
              this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            });
        },
    }
}
</script>

<style>
</style>