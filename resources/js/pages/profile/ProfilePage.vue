<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" v-bind:src="getImagenUrl" alt="">
                  </div>
                  <input type="file" id="avatarimg" class="form-control-file border" accept=".jpg,.png" @change="onFileChange">
                  <button type="button" class="btn btn-outline-primary btn-block btn-sm" @click.prevent="updateImagen()" :disabled="loadingImagen">
                    <i class="fa fa-camera" style="font-size:24px"></i>  
                   </button>
                </div>
              </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header ">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <small class="text-muted">Username</small>
                                <h6>{{ getUser.username }}</h6>
                                
                                <small class="text-muted pt-5">Email</small>
                                <h6>{{ getUser.email }}</h6>

                                <small class="text-muted pt-5">Id Payeer</small>
                                <h6>{{ getUser.payeer }}</h6>

                                <small class="text-muted pt-5">Referral Code</small>
                                <h6>{{ getUser.id }}</h6>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <form class="user" v-on:submit.prevent="onSubmit">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="nombre" class="form-control"  v-model="username">
                                </div>      
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="nombre" class="form-control" v-model="email">
                                </div>      
                                <div class="form-group">
                                    <label>Id Payeer</label>
                                    <input type="text" name="nombre" class="form-control" v-model="payeer">
                                </div>    
                                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"  :disabled="loadingSubmit">Update</button>
                                </form>
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
            errors:[],
            loadingSubmit: false,
            loadingImagen: false,
            username: '',
            email: '',
            payeer: '',
            imagen: ''
        }
    },
    mounted() {
        this.getData();
    },
    methods:{
        getData(){
            let user = this.$store.state.user;
            this.username = user.username;
            this.email = user.email;
            this.payeer = user.payeer;
        },
        onSubmit(){
            this.errors = [];
            this.loadingSubmit = true;
            let data = {
              username: this.username,
              email: this.email,
              payeer: this.payeer
            }
            this.req.post('auth/update',data).then( response =>{
                //console.log(response);
                this.loadingSubmit = false; 
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
                this.$store.commit('authUser',response.data.user);
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
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length){
                return;
            }
            this.imagen = files[0];
        },
        updateImagen(){
            if(this.imagen == ''){
                this.$swal({
                title: '',
                text: 'no image to upload',
                icon: 'warning',
              });
              return;
            }

            this.loadingImagen = true;
            var formData = new FormData();
            console.log(this.imagen);
            formData.append('imagen',this.imagen);
            
            this.req.post('auth/imagen',formData).then( response => {
                this.loadingImagen = false;
                document.getElementById('avatarimg').value ='';
                this.imagen = '';
                
                this.$swal({
                  title: '',
                  text: response.data.message,
                  icon: 'success',
                });
                this.$store.commit('authUser',response.data.user);
            }).catch( error =>{
              this.loadingImagen = false;
              if(error.response.data.errors) this.errors = error.response.data.errors;
              this.$swal({
                title: '',
                text: error.response.data.message,
                icon: 'warning',
              });
            });
        }
    },
    computed:{
      getUser(){
        return this.$store.state.user;
      },
      getImagenUrl(){
        let user = this.$store.state.user;
        if(user.imagen != '' && user.imagen != null){
        return BASE_URL+'/storage/users/'+user.imagen
        }else{
        return 'https://image.shutterstock.com/image-vector/male-avatar-profile-picture-vector-260nw-149083895.jpg';
        }
      }
    }
}
</script>

<style>
</style>