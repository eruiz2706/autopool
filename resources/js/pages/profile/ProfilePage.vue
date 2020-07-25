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
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://image.shutterstock.com/image-vector/male-avatar-profile-picture-vector-260nw-149083895.jpg" alt="">
                  </div>
                  <button type="button" class="btn btn-outline-primary btn-block btn-sm">
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
                                <h6>Eduardo Ruiz</h6>
                                
                                <small class="text-muted pt-5">Email</small>
                                <h6>eruiz2706@gmail.com</h6>

                                <small class="text-muted pt-5">Id Payeer</small>
                                <h6>fa231jkl123uoi123423hjk2h34hjk23h4kj2h34</h6>

                                <small class="text-muted pt-5">Referral Code</small>
                                <h6>http://127.0.0.1:8000/#/register/1231231234123</h6>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="nombre" class="form-control" value="Eduardo Ruiz">
                                </div>      
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="nombre" class="form-control" value="eruiz2706@gmail.com">
                                </div>      
                                <div class="form-group">
                                    <label>Id Payeer</label>
                                    <input type="text" name="nombre" class="form-control" value="fa231jkl123uoi123423hjk2h34hjk23h4kj2h34" disabled>
                                </div>    

                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Update</a>
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
    mounted() {
    
    },
    methods:{
    }
}
</script>

<style>
</style>