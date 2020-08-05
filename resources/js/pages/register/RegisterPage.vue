<template>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image" v-bind:style="`background-image: url(${imagenRegister})`"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create Your Account!</h1>
              </div>
              <form class="user" v-on:submit.prevent="onSubmit">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Username" v-bind:class="[errors.username ? 'is-invalid' : '']" v-model="username">
                  <span class="text-danger" v-if="errors.username" v-text='errors.username[0]'></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Email"  v-bind:class="[errors.email ? 'is-invalid' : '']"  v-model="email">
                  <span class="text-danger" v-if="errors.email" v-text='errors.email[0]'></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Id Payeer" v-bind:class="[errors.payeer ? 'is-invalid' : '']"  v-model="payeer">
                  <span class="text-danger" v-if="errors.payeer" v-text='errors.payeer[0]'></span>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Referral Code" v-bind:class="[errors.referido_id ? 'is-invalid' : '']"  v-model="referido_id">
                  <span class="text-danger" v-if="errors.referido_id" v-text='errors.referido_id[0]'></span>
                </div>
                <button  class="btn btn-primary btn-user btn-block" type="submit" :disabled="loadingSubmit">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <router-link class="small" to="/login">Already have an account? Login!</router-link >
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
            imagenRegister: BASE_URL+'/images/app/register.jpg',
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            errors:[],
            loadingSubmit: false,
            username: '',
            email: '',
            payeer: '',
            referido_id: ''
        }
    },
    mounted() {
      this.logout();
    },
    methods:{
        onSubmit(){
            this.errors = [];
            this.loadingSubmit = true;
            let data = {
              username: this.username,
              email: this.email,
              payeer: this.payeer,
              referido_id: this.referido_id
            }
            console.log(data);
            this.req.post('auth/register',data).then( response =>{
                //console.log(response);
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
            
        },
        logout(){
          this.req.post('auth/logout').then( response => {
            this.$store.commit('logoutUser',null);
          });
        },
    }
}
</script>

<style>
</style>