<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Deposite</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 mb-4" v-for="(monto, index) in montos" :key="monto">
                    <div id="100" v-bind:class="(selectCard === index) ? 'card bg-primary text-white shadow': 'card bg-light text-black shadow'"  v-on:click="clickCard(monto, index)">
                        <div class="card-body" style="cursor:pointer">
                        RUB
                        <div class="text-white-100 float-right"><i class="fa fa-ruble-sign"></i> {{ monto }}</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <form class="deposite" v-on:submit.prevent="onSubmit">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    New deposite
                </h6>
                </div>
                <div class="card-body">
                    <div class="callout callout-info">
                        <p>
                            <i class="fa fa-fw fa-info"></i>
                            The minimum amount is 100 Rub
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" v-model="monto" @focus="focusMonto()" >
                    </div>
                    
                    <button class="btn btn-primary btn-block" type="submit" :disabled="loadingSubmit">
                        Pay
                    </button>
                </div>
            </div>
        </form>
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
            montos: [],
            errors:[],
            loadingSubmit: false,
            monto: 0,
            selectCard: 0
        }
    },

    mounted() {
        this.montos = [100,200,300,500,700,1000];
        this.monto = this.montos[0];
    },
    methods:{
        focusMonto(){
            this.selectCard = -1;
        },
        clickCard(monto, index) {
            this.monto = monto;
            this.selectCard = index;
        },
        onSubmit(){
            this.errors = [];
            this.loadingSubmit = true;
            let data = {
              monto: this.monto
            }
            this.req.post('deposite/crear',data).then( response =>{
                this.loadingSubmit = false; 
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
                this.$router.push('/deposite-history');
            }).catch( error =>{
              this.loadingSubmit = false; 
              if(error.response.data.errors) this.errors = error.response.data.errors;
              this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            });
        }
    }
}
</script>

<style>
</style>