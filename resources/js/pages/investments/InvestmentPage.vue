<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Investment Plans</h1>
    </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-4 mb-4" v-for="pool in pools" :key="pool.id">
              <div class="card  shadow h-90">
                <div class="card-body">
                  <div class="row  align-items-center">
                    <div class="col-auto">
                      <i class="fa fa-ruble-sign fa-5x text-gray-300"></i>
                    </div>
                    <div class="col mr-3">
                      <div v-bind:class="`h5 font-weight-bold text-${pool.color}  text-uppercase mb-1`">
                        {{ pool.valor }} RUB
                      </div>
                      <button class="btn btn-light btn-icon-split" v-if="pool.id === pool_activa" @click.prevent="comprarPool(pool.id)">
                        <span class="icon text-gray-600"><i class="fas fa-arrow-right"></i></span>
                        <span class="text">Invest Now</span>
                      </button>
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
            pools: [],
            pool_activa: 0
        }
    },
    mounted() {
      this.getListado();
    },
    methods:{
      getListado(){
          this.req.get('pools/listado').then( response => {
              this.pools = response.data.pools;
              this.pool_activa = response.data.pool_activa
              console.log(response);
          }).catch( error =>{
              console.log(error);
          });
      },
      comprarPool(id){
        this.req.post('pools/comprar',{id:id}).then( response => {
              //this.pools = response.data.pools;
              //this.pool_activa = response.data.pool_activa
              this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
              console.log(response);
          }).catch( error =>{
            this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            console.log(error);
          });
      }
    }
}
</script>

<style>
</style>