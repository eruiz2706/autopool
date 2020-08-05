<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Deposite</h1>
    </div>

        <!-- Content Row -->
        <div class="row" id="rubs">
            <div class="col-md-4 mb-4">
                <div id="100" class="card bg-light text-black shadow"  v-on:click="select($event)">
                <div class="card-body">
                    RUB
                    <div class="text-white-100 float-right">$ 100</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div id="200" class="card bg-light text-black shadow"  v-on:click="select($event)">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 200</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" >
                <div id="300" class="card bg-light text-black shadow" v-on:click="select($event)">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 300</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div id="500" class="card bg-light text-black shadow" v-on:click="select($event)">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 500</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div id="700" class="card bg-light text-black shadow" v-on:click="select($event)">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 700</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div id="CUST" class="card bg-light text-black shadow"  v-on:click="select($event)">
                <div class="card-body">
                    <label>CUSTOM</label>
                    <input class="form-control" type="number" id="custom"  value="0" v-on:keyup="sendValue($event)"> 
                </div>
                </div>
            </div>
        </div>
        
        <form class="deposite" v-on:submit.prevent="onSubmit">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New deposite</h6>
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
                            <input id="amount" type="text" class="form-control" value="100" v-model="monto"> 
                        </div> 

                        <button class="btn btn-primary" type="submit" :disabled="loadingSubmit">
                            <span class="text">Pay</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://s3-eu-west-1.amazonaws.com/tpd/screenshotlogo-domain/5817fb050000ff000596da8c/198x149.png" alt="">
            </div>
        </div>
        </form>
</div>
</template>

<script>
export default {
    data(){
        return{
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            errors:[],
            loadingSubmit: false,
            monto: ''
        }
    },

    mounted() {
    
    },
    methods:{
        select: function(event) {
            var targetId = event.currentTarget.id;
            var i;
            var x = document.getElementsByClassName('card bg-primary text-white shadow');
            for (i = 0; i < x.length; i++) {
                x[i].className = "card bg-light text-black shadow";
            }
            
            document.getElementById(targetId).className = "card bg-primary text-white shadow";
            if(targetId!="CUST"){
                document.getElementById('amount').value = targetId;
            }
        },

        sendValue: function(event){
            if(event.keyCode === 13){
                event.preventDefault();
                document.getElementById('amount').value = document.getElementById('custom').value
            }
        },

        onSubmit(){
            this.monto = document.getElementById('amount').value;

            this.errors = [];
            this.loadingSubmit = true;
            let data = {
              monto: this.monto
            }
            console.log(data);
            this.req.post('auth/depositeregister',data).then( response =>{
                this.loadingSubmit = false; 
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
                this.$router.push('/dashboard');
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