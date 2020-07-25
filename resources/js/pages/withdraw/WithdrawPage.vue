<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Withdraw</h1>
    </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New withdraw</h6>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-info">
                            <p>
                                <i class="fa fa-fw fa-info"></i>
                                Withdrawal minimum 100 Rub and maximum 1000 Rub
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="nombre" class="form-control" value="100"> 
                        </div>

                        <a href="#" class="btn btn-primary">
                            <span class="text">Pay</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-bottom-info shadow  py-2">
                <div class="card-body">
                  <div class="row  align-items-center">
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-4x text-gray-300"></i>
                    </div>
                    <div class="col mr-3">
                      <div class="h5 font-weight-bold text-info  text-uppercase mb-1">Total balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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