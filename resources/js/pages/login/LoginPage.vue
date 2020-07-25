<template>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" v-bind:style="`background-image: url(${imagenLogin})`"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login to your account</h1>
                  </div>
                  <form class="user pt-5 pb-5" v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" placeholder="Enter Id Payeer" v-model='payeer'>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" :disabled="loadingSubmit">Login</button>
                  </form>
                  <hr>
                  <div class="text-center pb-5">
                    <router-link  class="small" to='/register'>Create your account!</router-link>
                  </div>
                </div>
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
            imagenLogin: BASE_URL+'/images/app/login.jpg',
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            loadingSubmit: false,
            payeer: ''
        }
    },
    mounted() {
      this.logout();
    },
    methods:{
        logout(){
          this.req.post('auth/logout').then( response => {
            this.$store.commit('logoutUser',null);
          });
        },
        onSubmit(){
            this.loadingSubmit = true;
            this.req.post('auth/login',{payeer:this.payeer}).then( response =>{
                //console.log(response);
                this.loadingSubmit = false; 
                this.$router.push('/dashboard');
            }).catch( error =>{
              this.loadingSubmit = false; 
              this.$swal({
                title: '',
                text: error.response.data.error,
                icon: 'warning',
              });
            });
            
        }
    }
}
</script>

<style>
</style>